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
        'description',
        'amount',
        'timestamp',
    ];

    public $timestamps = false;


    public function profile(){
        return $this->hasOne('\App\Models\Profiles','id','id_profile');
    }

    public function admin(){
        return $this->hasOne('\App\Models\Admins','id','id_admin');
    }

    public function donation(){
        return $this->hasOne('\App\Models\Donations','id','id_donation');
    }
}
