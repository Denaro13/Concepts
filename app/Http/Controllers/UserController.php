<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('users.show', compact('user', 'editing', 'concepts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }
}
