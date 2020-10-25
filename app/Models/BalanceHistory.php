<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{
    protected $table = 'balance_history';
    protected $fillable = [
        'id_admin',
        'id_profile',
        'id_donation',
        'action',
        'amount',
        'timestamp',
    ];

    public $timestamps = false;
}
