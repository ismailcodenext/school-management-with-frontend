<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrincipalMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'principal_name',
        'designation',
        'principal_message',
        'img_url',
        'user_id',
    ];
}
