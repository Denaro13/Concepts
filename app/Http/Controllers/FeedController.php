<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followersIds = auth()->user()->followings()->pluck('user_id');

        $concepts = Concept::whereIn('user_id', $followersIds)->latest();

        if (request()->has('search')) {
            //where ... content like %hello%
            $concepts = $concepts->where('content', "like", '%' . request()->get('search', "") . '%');
        }

        return view('dashboard', [
            'concepts' => $concepts->paginate(5)
        ]);
    }
}
