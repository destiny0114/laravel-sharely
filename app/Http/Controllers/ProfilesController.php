<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->latest()->paginate(10)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $attributes = $request->validate([
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif' ,'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'bio' => ['string'],
            'password' => ['required', 'min:8', 'string', 'confirmed', Password::defaults()],
        ]);

        try {
            if ($request->file('avatar')) {
                $user->storeImage($request->file('avatar'), 'avatars','avatar');
            }

            $user->name = $attributes['name'];
            $user->email = $attributes['email'];
            $user->password = $attributes['password'];
            $user->bio = $attributes['bio'];

            $user->save();

            $old_notifications = $user->notifications;
            $old_notifications->map(function ($notification) use ($user) {
                $tmp_body = $notification['data']['body'];

                $notification->update(['data' => 
                    ['username' => $user->username,
                    'name' => $user->name,
                    'avatar' => $user->avatar,
                    'body' => $tmp_body]
                ]);

                return $notification;
            });

            return redirect()->route('profile', $user->username);
        } catch (FileNotFoundException $exception) {
            abort(404);
        }
    }

    public function upload(User $user, Request $request)
    {
        if ($request->file('cover')) {
            $user->storeImage($request->file('cover'), 'covers','cover');
        }
        return redirect()->route('profile', $user->username);
    }
}
