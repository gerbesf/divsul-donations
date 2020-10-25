<?php

namespace App\Http\Livewire\Donations;

use App\Jobs\DonationConfirm;
use App\Models\Donations;
use Carbon\Carbon;
use Livewire\Component;

class ConfirmPayment extends Component
{

    public $id_donation;
    public $entity;
    public $amount_received;

    public $has_confirmed = false;

    public function mount($id_donation){
        $this->id_donation = $id_donation;
        $this->populate();
    }

    public function populate(){
        $this->entity = Donations::where('id',$this->id_donation)->first();

        if($this->entity->confirmed==true){
            $this->has_confirmed = true;
        }

        if($this->entity->amount_received){
            $this->amount_received = $this->entity->amount_received;
        }
    }

    public function confirmPayment(){

        Donations::where('id',$this->id_donation)->update([
            'amount_received'=>$this->amount_received,
            #'date_confirmed'=>Carbon::now(),
            'confirmed'=>true
        ]);


        dispatch( new DonationConfirm( $this->id_donation , session()->get('user_id')));

    }

    public function render()
    {
        return view('livewire.donations.confirm-payment');
    }
}
