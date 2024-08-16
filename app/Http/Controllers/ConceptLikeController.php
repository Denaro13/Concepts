<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;

class ConceptLikeController extends Controller
{
    public function like(Concept $concept)
    {
        $liker = auth()->user();

        $liker->likes()->attach($concept);

        return redirect()->route('dashboard')->with('success', 'Liked Successfully!');
    }

    public function unlike(Concept $concept)
    {
        $liker = auth()->user();

        $liker->likes()->detach($concept);

        return redirect()->route('dashboard')->with('success', 'Unliked Successfully!');
    }
}
