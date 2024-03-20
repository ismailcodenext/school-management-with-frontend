<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_name',
        'section_name',
        'student_roll',
        'sesson',
        'user_id',
    ];
}
