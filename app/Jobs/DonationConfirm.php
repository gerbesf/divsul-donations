<?php

namespace App\Jobs;

use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Donations;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DonationConfirm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id_donation;
    public $id_admin;
    public $donation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $id_donation , $id_admin)
    {
        $this->id_donation = $id_donation;
        $this->id_admin = $id_admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->donation = Donations::where('id',$this->id_donation)->first();

        Donations::where('id',$this->id_donation)->update([
            'date_confirmed'=>Carbon::now(),
            'confirmed'=>true
        ]);

        $this->addBalance();
    }

    public function addBalance(){

        $Balance = Balance::where('id',1)->first();

        Balance::where('id',1)->update([
            'amount'=> $Balance->amount + $this->donation->amount_received
        ]);

        BalanceHistory::create([
            'id_admin' => $this->id_admin,
            'id_profile' => $this->donation->id_profile,
            'id_donation' => $this->id_donation,
            'action'=>'increment',
            'amount'=>$this->donation->amount_received,
            'timestamp'=>Carbon::now(),
        ]);

    }
}
