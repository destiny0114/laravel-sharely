<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $guarded = [];

    protected function url(): Attribute
    {
        return Attribute::make(
            set: fn($value) => asset($value ?? 'images/default_avatar.png'),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
