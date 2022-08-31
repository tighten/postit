<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingSetting extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array',
    ];

    protected $guarded = [];
}
