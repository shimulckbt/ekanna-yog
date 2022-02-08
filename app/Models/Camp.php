<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    protected $fillable = [
        'camp_title',
        'location',
        'organizer',
        'member',
        'camp_image',
        'blog_title',
        'blog_image',
        'blog',
    ];
}
