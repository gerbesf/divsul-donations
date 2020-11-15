<?php

namespace App\Http\Livewire\Donations;

use App\Models\Balance;
use App\Models\BalanceHistory;
use Carbon\Carbon;
use Livewire\Component;

class RegisterExpense extends Component
{

    public $description;
    public $amount;

    protected $rules = [
        'description' => 'required|min:6',
        'amount' => 'required|min:3',
    ];

    public function submit()
    {
        $this->validate();

        BalanceHistory::create([
            'id_admin'=>session()->get('user_id'),
            'id_profile'=>null,
            'id_donation'=>null,
            'action'=>'decrement',
            'description'=>$this->description,
            'amount'=>(float) str_replace(',','.', $this->amount),
            'timestamp'=>Carbon::now(),
        ]);

        $getBalance = Balance::first();

        Balance::where('id',1)->update([
            'amount'=>$getBalance->amount - $this->amount
        ]);

        return redirect(route('admin'));

    }

    public function render()
    {
        return view('livewire.donations.register_expense',[
        ]);
    }
}
