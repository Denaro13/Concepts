<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Concept $id)
    {
        $comment = new Comment();
        $comment->concept_id = $id->id;
        $comment->user_id = Auth::id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('concepts.show', $id->id)->with('success', 'comment posted successfully!');
    }
}
