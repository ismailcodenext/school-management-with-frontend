<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_url',
        'description',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'address',
        'number',
        'email',
        'pageLink',
        'user_id'
    ];
}
