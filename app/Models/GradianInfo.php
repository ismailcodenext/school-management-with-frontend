<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradianInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'father_name',
        'father_mobile',
        'father_profession',
        'father_image',
        'mother_name',
        'mother_mobile',
        'mother_profession',
        'mother_image',
        'guardian_name',
        'guardian_mobile',
        'guardian_profession',
        'guardian_image',
        'guardian_email',
        'guardian_address',
        'guardian_relation',
        'status',
        'user_id'

    ];
}
