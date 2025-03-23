<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $fillable = [
        'name',
        'profile',
        'gender',
        'age',
    ];
}
