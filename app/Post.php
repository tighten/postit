<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
