<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $concepts = $user->concepts()->paginate(5);
        return view('users.show', compact('user', 'concepts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $concepts = $user->concepts()->paginate(5);
        return view('users.edit', compact('user', 'editing', 'concepts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:25',
            'bio' => 'nullable|min:6|max:255',
            'image' => 'image'
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);

        return redirect()->route('profile', $user->id)->with('success', 'Profile updated successfully');
    }
    public function profile()
    {
        return $this->show(Auth::user());
    }
}
