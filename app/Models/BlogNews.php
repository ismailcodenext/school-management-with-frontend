<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogNews extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'details',
        'category',
        'img_url',
        'user_id',
    ];
}
