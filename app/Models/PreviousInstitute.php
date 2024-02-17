<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousInstitute extends Model
{
    use HasFactory;

    protected $fillable = [
        'institute_names',
        'class_name',
        'years',
        'user_id'
    ];
}
