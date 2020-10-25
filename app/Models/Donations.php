<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $table = 'donations';

    protected $fillable = [
        'confirmed',
        'hide_profile',
        'id_profile',
        'id_method',
        'currency',
        'currency_received',
        'amount',
        'amount_received',
        'receipt',
        'date_created',
        'date_confirmed',
    ];

    protected $dates = [
        'date_created','date_confirmed'
    ];

    protected $casts =[
        'confirmed'=>'boolean'
    ];

    public $timestamps = false;

    public function profile(){
        return $this->hasOne('\App\Models\Profiles','id','id_profile');
    }

    public function method(){
        return $this->hasOne('\App\Models\DonationsMethods','id','id_method');
    }

    public function confirmation(){
        return $this->hasOne('\App\Models\BalanceHistory','id_donation','id');
    }

}
