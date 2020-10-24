<?php

namespace App\Http\Livewire\Servers;

use App\Jobs\ServerSync;
use App\Models\Servers;
use Livewire\Component;

class Collection extends Component
{

    public function syncServer( $id ){
        Servers::where('id',$id)->update([
            'status'=>'updating'
        ]);
        dispatch( new ServerSync( $id ));
    }

    public function render()
    {
        return view('livewire.servers.collection',[
            'servers'=>Servers::paginate('5')
        ]);
    }
}
