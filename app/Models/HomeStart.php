<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeStart extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutle',
        'description',
        'yt_link',
        'image',
        'is_active',
    ];
}
