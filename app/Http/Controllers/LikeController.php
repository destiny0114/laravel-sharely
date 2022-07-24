<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        auth()->user()->toggleLike($tweet);
        return redirect()->back();
    }
}
