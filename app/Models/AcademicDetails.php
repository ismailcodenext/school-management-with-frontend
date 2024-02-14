<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_name',
        'admisstion_date',
        'roll_no',
        'classroom_id',
        'section_id',
        'group_id',
        'student_infos_id',
        'user_id'
    ];
}
