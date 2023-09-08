<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Post $post) {
            $post->slug ??= str($post->title)->slug();
        });
    }
}
