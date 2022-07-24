<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = auth()->user()->search($request->search);

        return view('explore.index', compact('users'));
    }
}
