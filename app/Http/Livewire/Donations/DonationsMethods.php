<?php

namespace App\Http\Livewire\Donations;

use Livewire\Component;

class DonationsMethods extends Component
{

    public $modify_id;
    public $active = true;
    public $name;
    public $logo;
    public $content;

    protected $rules = [
        'name' => 'required|min:6',
        'logo' => 'required|min:10',
        'content' => 'required|min:10',
    ];

    public function createMethod(){

        $this->validate();

        \App\Models\DonationsMethods::create([
            'name' => $this->name,
            'logo' => $this->logo,
            'content' => $this->content,
            'active' => $this->active,
        ]);

        $this->name = '';
        $this->logo = '';
        $this->content = '';

    }

    public function modify( $id ){
        $this->modify_id = $id;
        $entity = \App\Models\DonationsMethods::where('id',$id)->first();
        $this->name = $entity->name;
        $this->logo = $entity->logo;
        $this->content = $entity->content;
        $this->active = $entity->active;
    }


    public function updateMethod(){

        $this->validate();

        \App\Models\DonationsMethods::where('id',$this->modify_id)->update([
            'name' => $this->name,
            'logo' => $this->logo,
            'content' => $this->content,
            'active' => $this->active,
        ]);

        $this->name = '';
        $this->logo = '';
        $this->content = '';
        $this->modify_id = null;

    }

    public function destroy(){
        \App\Models\DonationsMethods::where('id',$this->modify_id)->delete();
        $this->name = '';
        $this->logo = '';
        $this->content = '';
        $this->modify_id = null;
    }

    public function render()
    {
        return view('livewire.donations.methods',[
            'methods'=>\App\Models\DonationsMethods::get()
        ]);
    }
}
