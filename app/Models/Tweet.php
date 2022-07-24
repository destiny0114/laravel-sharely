<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likeable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphOne(Media::class, 'imageable');
    }
}
