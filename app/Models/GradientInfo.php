<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradientInfo extends Model
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
        'student_infos_id',
        'user_id'
    ];

    public static function id()
    {
    }
}
