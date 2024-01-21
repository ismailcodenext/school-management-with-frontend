<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branding extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'nameBangla',
        'nameEnglish',
        'address',
        'eiin',
        'code',
        'user_id'

    ];
}
