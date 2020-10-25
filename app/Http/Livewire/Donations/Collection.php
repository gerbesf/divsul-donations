<?php

namespace App\Http\Livewire\Donations;

use App\Jobs\DonationConfirm;
use Livewire\Component;

class Collection extends Component
{

    public $confirmed = true;

    public function mount( $confirmed ){
        $this->confirmed = $confirmed;
    }

    public function confirmDonation( $id ){
        dispatch( new DonationConfirm( $id , session()->get('user_id')));
    }

    public function render()
    {
        return view('livewire.donations.collection',[
            'donations'=>\App\Models\Donations::where('confirmed', filter_var($this->confirmed, FILTER_VALIDATE_BOOLEAN) )->paginate(10)
        ]);
    }
}
