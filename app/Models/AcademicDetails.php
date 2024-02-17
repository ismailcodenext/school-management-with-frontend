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
        'user_id'
    ];

}
