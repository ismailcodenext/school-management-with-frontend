<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'blood_group',
        'religion',
        'mobile',
        'email',
        'mother_tongue',
        'bc_no',
        'nid_no',
        'present_address',
        'permanent_address',
        'city',
        'state',
        'img_url',
        'user_id'

    ];

    function gradiant(){
        return $this->hasMany(GradiantInfos::class);
    }
}
