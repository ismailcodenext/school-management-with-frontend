<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'img_url',
        'user_id',
    ];
}
