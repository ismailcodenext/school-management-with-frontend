<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousInstituteDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_names',
        'class_name',
        'years',
        'student_infos_id',
        'user_id'

    ];
}
