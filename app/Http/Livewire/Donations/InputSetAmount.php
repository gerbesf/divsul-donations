<?php

namespace App\Http\Livewire\Donations;

use App\Models\Donations;
use Livewire\Component;
use Mockery\Exception;

class InputSetAmount extends Component
{

    public $id_donation;
    public $amount_received;

    public function mount($id){
        $this->id_donation = $id;
    }

    public function submit(){

        try{

            $num = str_replace(['.'],'',$this->amount_received);
            $num = str_replace([','],'.',$num);
            if( !is_numeric($num)){
                throw new Exception(' Valor não é númerico ');
            }

            $amount = $num;

            Donations::where('id',$this->id_donation)->update([
                'amount_received' => $amount
            ]);

            return redirect(route('donations_admin').'?confirmed=false');

        }catch (Exception $exception){
            throw new Exception(' Errro o formatar preço');
        }

    }

    public function render()
    {
        return view('livewire.donations.input_set_amount');
    }
}
