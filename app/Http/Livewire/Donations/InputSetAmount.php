<?php

namespace App\Http\Livewire\Donations;

use App\Models\Donations;
use Livewire\Component;

class InputSetAmount extends Component
{

    public $id_donation;
    public $amount_received;

    public function mount($id){
        $this->id_donation = $id;
    }

    public function submit(){

        $amount = number_format( floatval(
            str_replace(',','.',str_replace('.','',$this->amount_received))
        ) ,2,'.','');

        Donations::where('id',$this->id_donation)->update([
           'amount_received' => $amount
        ]);

        return redirect(route('donations_admin').'?confirmed=false');

    }

    public function render()
    {
        return view('livewire.donations.input_set_amount');
    }
}
