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

    public function store(Tweet $tweet)
    {
        $attribute = request()->validate([
            'body' => 'required|max:255'
        ]);
        $tweet->create([
            'user_id' => request()->user()->id,
            'body' => $attribute['body']
        ]);
        return redirect()->route('home')->withFragment('timeline');
    }
}
