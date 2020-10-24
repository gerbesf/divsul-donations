<?php

namespace App\Http\Livewire\Players;

use App\Models\Profiles;
use App\Models\Servers;
use Livewire\Component;

class Collection extends Component
{

    public $search = '';

    public function render()
    {

        if( strlen( $this->search )>=1) {

            return view('livewire.players.collection',[
                'players'=>Profiles::where('nickname','like','%'.$this->search.'%')->paginate('50')
            ]);

        }else{

            return view('livewire.players.collection',[
                'players'=>Profiles::paginate('50')
            ]);

        }


    }
}
