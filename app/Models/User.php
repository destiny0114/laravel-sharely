<?php

namespace App\Models;

use App\Traits\Followable;
use App\Traits\Mediable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'bio',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar',
        'cover'
    ];

    protected function password(): Attribute
    {
        return Attribute::set(fn($value) => Hash::make($value));
    }

    protected function bio(): Attribute
    {
        if ($this->can("edit_profile", auth()->user())) {
            return Attribute::get(fn($value) => $value ?? "Try describe yourself.");
        }
    }

    protected function getAvatarAttribute()
    {
        return $this->filterImage('avatar') ?? '/images/default_avatar.png';
    }

    protected function getCoverAttribute()
    {
        return $this->filterImage('cover')  ?? 'https://source.unsplash.com/random';
    }

    public function timeline()
    {
        $followred_ids = $this->followings->pluck('id');
        return Tweet::query()->whereIn('user_id', $followred_ids)->orWhere('user_id', $this->id)->latest()->take(100)->paginate(10);
    }

    public function list_followings()
    {
        return $this->followings()->latest()->limit(10)->get();
    }

    public function search($term)
    {
        if (empty($term)) return null;

        return $this->query()
            ->where(function (Builder $query) use ($term) {
                $query->where('username', 'like', '%' . $term . '%')
                    ->orWhere('name', 'like', '%' . $term . '%');
            })
            ->where('id', '!=', $this->id)
            ->latest()
            ->paginate(6);
    }

    public function toggleLike(Tweet $tweet)
    {
        $existing_like = $tweet->likes()->withTrashed()->where('user_id', $this->id)->first();

        if (is_null($existing_like)) {
            return $this->like($tweet);
        }

        if (is_null($existing_like->deleted_at)) {
            return $this->unlike($tweet);
        }
        return $existing_like->restore();
    }

    public function like(Tweet $tweet)
    {
        if ($tweet->hasLikedBy($this)) {
            return response('Cannot like the same thing twice', '409');
        }
        $like = new Like();
        $like->user()->associate($this);
        $like->likeable()->associate($tweet);
        return $like->save();
    }

    public function unlike(Tweet $tweet)
    {
        return $tweet->likes()->where('user_id', $this->id)->delete();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'imageable');
    }
}
