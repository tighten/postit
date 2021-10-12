<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
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
