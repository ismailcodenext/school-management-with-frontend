<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradiantInfos extends Model
{
    use HasFactory;

    protected $fillable = [
        'guardian_name',
        'relation',
        'father_name',
        'mother_name',
        'occupation',
        'income',
        'education',
        'email',
        'mobile',
        'address',
        'city',
        'state',
        'img_url',
        'user_id'
    ];
}
