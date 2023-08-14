<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSet extends Model
{
    protected $table = 'register_sets';

    protected $fillable = [
        'name',
        'email',
        'token',
        'password',
    ];
}
