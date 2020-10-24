<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Profiles;
use Livewire\Component;

class PlayersCardTotals extends Component
{
    public $total = 0;

    public function countProfiles(){
        $this->total = Profiles::count();
    }

    public function render()
    {
        $this->countProfiles();
        return view('livewire.widgets.players-card-totals');
    }
}
