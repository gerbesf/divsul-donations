<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    protected $table = 'servers';

    protected $fillable = [
        'name',
        'ip_address',
        'endpoint_cd_hash',
        'endpoint_protected',
        'endpoint_username',
        'endpoint_password',
    ];

    public $timestamps = true;

}
