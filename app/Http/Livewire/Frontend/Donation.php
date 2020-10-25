<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Donation extends Component
{
    public function render()
    {
        return view('livewire.frontend.donation',[
            'balance'=>\App\Models\BalanceHistory::orderBy('timestamp','desc')->get(),
            'donations'=>\App\Models\Donations::where('confirmed',false)->paginate(10)
        ]);
    }
}
