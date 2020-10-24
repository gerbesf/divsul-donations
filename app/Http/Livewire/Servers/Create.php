<?php

namespace App\Http\Livewire\Servers;

use App\Models\Servers;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $ip_address;
    public $endpoint_cd_hash;
    public $endpoint_protected;
    public $endpoint_username;
    public $endpoint_password;

    protected $rules = [
        'name' => 'required|min:6',
        'ip_address' => 'required|ip|unique:servers',
        'endpoint_cd_hash' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $Server = new Servers();

        $Server->name = $this->name;
        $Server->ip_address = $this->ip_address;
        $Server->endpoint_cd_hash = $this->endpoint_cd_hash;

        if($this->endpoint_protected){
            $Server->endpoint_protected = $this->endpoint_protected;
            $Server->endpoint_username = $this->endpoint_username;
            $Server->endpoint_password = $this->endpoint_password;
        }

        $Server->save();

        return redirect(route('servers'));
    }
    public function render()
    {
        return view('livewire.servers.create');
    }
}
