<?php

namespace App\Http\Controllers;

use App\Events\Commented;
use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Tweet $tweet)
    {
        $request->validate([
            'comment' => ["required", "max:255"]
        ]);

        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->user()->associate($request->user());
        $tweet->comments()->save($comment);

        event(new Commented($tweet->user, $tweet->id));
        return redirect()->route('tweet', $tweet->id);
    }
}
