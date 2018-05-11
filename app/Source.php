<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('published_at', 'desc');
    }
}
