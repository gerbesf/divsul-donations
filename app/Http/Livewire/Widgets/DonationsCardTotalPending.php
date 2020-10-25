<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Donations;
use Livewire\Component;

class DonationsCardTotalPending extends Component
{
    public $total = 0;

    public function countServers(){
        $this->total = Donations::where('confirmed',false)->count();
    }

    public function render()
    {
        $this->countServers();
        return view('livewire.widgets.donations-card-total-pending');
    }
}
