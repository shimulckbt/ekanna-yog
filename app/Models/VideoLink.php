<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutle',
        'yt_video_link',
    ];
}
