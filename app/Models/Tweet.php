<?php

namespace App\Models;

use App\Traits\Likeable;
use App\Traits\Mediable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likeable, Mediable;

    protected $guarded = [];

    protected $appends = [
        'media',
        'comments_count'
    ];

    protected function getMediaAttribute()
    {
        return $this->filterImage('tweet') ?? null;
    }

    protected function getCommentscountAttribute()
    {
        return $this->comments->count() ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
