<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;

class Donation extends Component
{
    use WithPagination;


    public $balance_query = null;

    public $balancesAvaliables = [
        'all',
        'increment',
        'decrement'
    ];

    public function mount(){
        if(request()->has('balance')){
            $this->balance_query = request()->get('balance');
        }
        if(!$this->balance_query){
            return redirect(route('error').'?message=not_found');
        }
    }

    public function setBalance( $balance ){
        if( in_array( $balance, $this->balancesAvaliables )){
            $this->balance_query = $balance;
        }
        $this->populate();
    }

    protected function getBalance(){

        if( $this->balance_query == 'all' ) {
            $query = \App\Models\BalanceHistory::orderBy('timestamp','desc')->paginate(12);
        }else{
            $query = \App\Models\BalanceHistory::where('action',$this->balance_query)->orderBy('timestamp','desc')->paginate(6);
        }

        $query->withPath(route('history'));
        $query->appends('balance',$this->balance_query );

      #  dd($query);
        return $query;
    }

    protected function getDonations(){
        return \App\Models\Donations::where('confirmed',false)->paginate(10);
    }

    public function populate(){
        $this->data_balance = $this->getBalance();
    }

    public function render()
    {

        return view('livewire.frontend.donation',[
            'balance'=> $this->getBalance()
          #  'donations'=>$this->getDonations()
        ]);
    }
}
