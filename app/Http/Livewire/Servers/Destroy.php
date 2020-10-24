<?php

namespace App\Http\Livewire\Servers;

use App\Models\Servers;
use Livewire\Component;

class Destroy extends Component
{

    public $server_id;

    public function mount( $server_id ){
        $this->server_id = $server_id;
    }
    public function removeServer(  ){
        Servers::where('id',$this->server_id)->delete();
        return redirect(route('servers'));
    }

    public function render()
    {
        return view('livewire.servers.destroy');
    }
}
