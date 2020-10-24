<?php

namespace App\Http\Livewire\Servers;

use App\Models\Servers;
use Livewire\Component;

class Modify extends Component
{

    public $server_id;

    public $name;
    public $ip_address;
    public $endpoint_cd_hash;
    public $endpoint_protected = false;
    public $endpoint_username;
    public $endpoint_password;

    protected $rules = [
        'name' => 'required|min:6',
        'ip_address' => 'required|ip',
        'endpoint_cd_hash' => 'required',
    ];

    public function mount( $server_id ){
        $this->server_id = $server_id;
        $this->populate();
    }

    public function populate(){
        $data = Servers::where('id',$this->server_id)->first();
        $this->name = $data->name;
        $this->ip_address = $data->ip_address;
        $this->endpoint_cd_hash = $data->endpoint_cd_hash;
        $this->endpoint_protected = $data->endpoint_protected;
        $this->endpoint_username = $data->endpoint_username;
        $this->endpoint_password = $data->endpoint_password;
    }

    public function submit()
    {
        $this->validate();


        $scope = [
          'name' => $this->name,
          'ip_address' => $this->ip_address,
          'endpoint_cd_hash' => $this->endpoint_cd_hash,
          'endpoint_cd_hash' => $this->endpoint_cd_hash,
          'endpoint_protected' => $this->endpoint_protected,
          'endpoint_username' => $this->endpoint_username,
          'endpoint_password' => $this->endpoint_password,
        ];

        Servers::where('id',$this->server_id)->update($scope);

        return redirect(route('servers'));
    }

    public function render()
    {
        return view('livewire.servers.modify');
    }
}
