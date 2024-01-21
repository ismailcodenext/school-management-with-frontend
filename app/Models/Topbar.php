<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    use HasFactory;
    protected $fillable = ['address','contact','email','user_id' ];
}
