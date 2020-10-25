<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationsMethods extends Model
{
    protected $table = 'donations_methods';

    protected $fillable = [
        'active',
        'name',
        'logo',
        'content',
    ];

    protected $casts =[
        'active'=>'boolean'
    ];

    public $timestamps = true;
}
