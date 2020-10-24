<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Servers;
use Livewire\Component;

class ServersCardTotals extends Component
{
    public $total = 0;

    public function countServers(){
        $this->total = Servers::count();
    }

    public function render()
    {
        $this->countServers();
        return view('livewire.widgets.servers-card-totals');
    }
}
