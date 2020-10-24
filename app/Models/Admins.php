<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'active',
        'nickname',
        'username',
        'password'
    ];
}
