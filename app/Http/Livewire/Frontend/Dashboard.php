<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Balance;
use App\Models\Donations;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{


    public $currency = 'R$';
    public $meta = 0;
    public $month_dontations = 0;
    public $month_dontations_amount = 0;
    public $pending_donations = 0;
    public $count = 0;
    public $amount = 0;
    public $pending_donations_amount = 0;

    public function populate(){

        $Balance = Balance::first();

        $this->currency = $Balance->currency;
        $this->meta = $Balance->meta;
        $this->amount = $Balance->amount;

        $this->count = Donations::where('confirmed',true)
            ->whereYear('date_created', '=', date('Y'))
            ->whereMonth('date_created', '=', Carbon::now()->format('m'))
            ->count();

       /* dd([
            date('Y'),Carbon::now()->format('m')
        ]);*/
        $this->month_dontations_amount = Donations::where('confirmed',true)
            ->whereYear('date_created', '=', date('Y'))
            ->whereMonth('date_created', '=', Carbon::now()->format('m'))
            ->sum('amount_received');

        $this->pending_donations = Donations::where('confirmed',false)
            ->whereYear('date_created', '=', date('Y'))
            ->whereMonth('date_created', '=', Carbon::now()->format('m'))
            ->count();

        $pending_donationsQuery = Donations::where('confirmed',false)
            ->whereYear('date_created', '=', date('Y'))
            ->whereMonth('date_created', '=', Carbon::now()->format('m'))
            ->get();

        $this->pending_donations_amount = collect( $pending_donationsQuery )->groupBy('currency');
    }

    public function render()
    {
        $this->populate();
        return view('livewire.frontend.dashboard');
    }
}
