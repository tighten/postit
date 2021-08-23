<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function source()
    {
        return $this->belongsTo(self::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
