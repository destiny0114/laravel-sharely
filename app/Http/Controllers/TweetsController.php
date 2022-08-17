<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('tweets.index', [
            'tweets' => $request->user()->timeline(),
        ]);
    }

    public function show(Tweet $tweet)
    {
        return view('tweets.show', [
            'tweet' => $tweet->setRelation("comments", $tweet->comments()->paginate(10))
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => ['required', 'max:255'],
            'media' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

       $tweet = Tweet::create([
            'user_id' => $request->user()->id,
            'body' => $request->body
        ]);

        if ($request->file("media")) {
            $tweet->storeImage($request->file("media"), 'tweets', 'tweet');
        }

        return redirect()->route('home')->withFragment('timeline');
    }
}
