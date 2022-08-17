<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function list_followers(User $user)
    {
        return view('lists.followers', [
            'user' => $user,
            'followers' => $user->followers()->take(50)->paginate(10)
        ]);
    }

    public function list_followings(User $user)
    {
        return view('lists.followings', [
            'user' => $user,
            'followings' => $user->followings()->take(50)->paginate(10)
        ]);
    }
}
