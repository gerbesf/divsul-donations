<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Admins;
use Livewire\Component;

class AdminsCardTotals extends Component
{

    public $total = 0;
    public $list_admins = [];

    public function countAdmins(){
        $this->total = Admins::count();
        $this->list_admins = Admins::get();
    }

    public function render()
    {
        $this->countAdmins();

        return view('livewire.widgets.admins-card-totals');
    }
}
