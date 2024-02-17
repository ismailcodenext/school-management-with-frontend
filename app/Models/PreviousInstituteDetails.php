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
        'user_id'
    ];
}
