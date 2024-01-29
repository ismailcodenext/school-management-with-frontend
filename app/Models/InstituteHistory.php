<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution_image',
        'institution_description',
        'user_id',
    ];
}
