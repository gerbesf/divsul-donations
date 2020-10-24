<?php

namespace App\Http\Livewire;

use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{

    public $username;
    public $password;

    public $logging = false;

    protected $rules = [
        'username' => 'required|min:3',
        'password' => 'required|min:3',
    ];


    public function doLogin(){

        $this->logging = true;

        sleep(1);

        $this->validate();

        $getUser = Admins::where('username',$this->username)->first();

        if(!$getUser) {
            session()->flash('error', 'User not found');
            return false;
        }

        if( Hash::check( $this->password, $getUser->password) ){
            session()->put('user_id',$getUser->id);
            session()->put('username',$getUser->username);
            return redirect(route('admin'));
        }else{
            session()->flash('error', 'Password not math');
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
