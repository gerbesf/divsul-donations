<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Donations;
use Livewire\Component;

class DonationsCardTotalConfirmed extends Component
{
    public $total = 0;

    public function countServers(){
        $this->total = Donations::where('confirmed',true)->count();
    }

    public function render()
    {
        $this->countServers();
        return view('livewire.widgets.donations-card-total-confirmed');
    }
}
