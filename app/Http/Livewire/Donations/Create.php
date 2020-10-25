<?php

namespace App\Http\Livewire\Donations;

use App\Models\Donations;
use App\Models\Profiles;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{

    public $id_profile;
    public $profile;
    public $methods = [];
    public $currency_actual = 'BRL';
    public $currencies = [
        'BRL'=>'Real brasileiro',
        'USD'=>'Dólar americano',
        'EUR'=>'Euro',
        'ARS'=>'Peso argentino',
        'CLP'=>'Peso chileno',
        'BOB'=>'Boliviano',
        'VEF'=>'Bolívar',
    ];

    public $id_method=9;
    public $currency='BRL';
    public $amount = '';
    public $amount_received = '';
    public $confirmed=0;
    public $hide_profile=0;

    public function mount( $id_profile = false ){

        $this->id_profile = $id_profile;

        $this->populateMethods();
        $this->getProfile();

    }

    // Get Profile
    public function getProfile(){
        $this->profile = Profiles::where('id',$this->id_profile)->first();
    }

    // Populate Methods
    public function populateMethods(){
        $this->methods = \App\Models\DonationsMethods::get();
    }

    public function registerDonation(){

        if( $this->id_method == '0' ){
            return false;
        }

        $amount_received = ( $this->amount_received ?: $this->amount);
        $amount_received = number_format($amount_received,2,'.','');

        $confirmed = boolval($this->confirmed );

        $scope = [
            'id_profile' => $this->id_profile,
            'id_method' => $this->id_method,
            'hide_profile' => boolval($this->hide_profile) ?: false,
            'confirmed' => $confirmed,
            'currency' => $this->currency,
            'amount' =>  number_format($this->amount,2,'.',''),
            'currency_received' => $this->currency_actual,
            'amount_received'=>$amount_received,
            'date_created'=>Carbon::now()
        ];

        if($confirmed==true){
            $scope['date_confirmed']=Carbon::now();
        }

        $check = Donations::where('id_profile',$scope['id_profile'])->where('amount',$scope['amount'])->count();

        if($check == 0){
            Donations::create($scope);
        }

        return redirect(route('donations_admin').'?confirmed=false');
    }

    public function formatNumber(){

    }


    public function render()
    {
        return view('livewire.donations.create');
    }
}
