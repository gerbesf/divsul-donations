<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDonation;
use App\Models\Donations;
use App\Models\DonationsMethods;
use App\Models\Profiles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(){
        return redirect('/history?balance=all');
        return view('frontend.welcome',[
            'title'=>'welcome_title',
            'description'=>'welcome_description',
        ]);
    }
    public function how_to_donate(){


        $methods = DonationsMethods::get();

        return view('frontend.how_to_donate',[
            'title'=>'how_to_donate_title',
            'description'=>'how_to_donate_description',
            'methods'=>$methods
        ]);
    }
    public function send_confirmation(){

        $methods = DonationsMethods::get();

         $currencies = [
            'BRL'=>'Real brasileiro',
            'USD'=>'Dólar americano',
            'EUR'=>'Euro',
            'ARS'=>'Peso argentino',
            'CLP'=>'Peso chileno',
            'BOB'=>'Boliviano',
            'VEF'=>'Bolívar',
        ];

        return view('frontend.send_confirmation',[
            'title'=>'send_confirmation_title',
            'description'=>'send_confirmation_description',
            'methods'=>$methods,
            'currencies'=>$currencies
        ]);

    }
    public function send_register( CreateDonation $request ){


        $findPlayer = Profiles::where('hash',$request->hash)->first();
        if( !isset( $findPlayer->nickname )){
            session()->flash('error', 'Hash Not Found!');
            return redirect()->back();
        }

        $amount = number_format( floatval(
            str_replace(',','.',str_replace('.','',$request->get('amount')))
        ) ,2,'.','');

        $scope = [
            'hide_profile'=>boolval($request->get('hide_profile')),
            'date_created'=>Carbon::now(),
            'id_profile' => $findPlayer->id,
            'email' => $request->get('email'),
            'id_method' => $request->get('id_method'),
            'currency' => $request->get('currency'),
            'amount' => $amount,
        ];


        if($request->get('currency')=="BRL"){
            $scope['amount_receive']=$request->get('amount');
        }

        $check = Donations::where('id_profile',$scope['id_profile'])->where('confirmed',false)->count();
        if($check>=3){
            session()->flash('error', 'Você já tem 3 comprovantes em aberto.');
            return redirect()->back();
        }
        $checkCreate = Donations::where('id_profile',$scope['id_profile'])
            ->where('confirmed',false)
            ->where('amount',$scope['amount'])
            ->where('id_method',$scope['id_method'])
            ->count();
        if($checkCreate==0){
            Donations::create($scope);
        }

        return redirect(route('history').'?balance=all');

    }
    public function history(){

        return view('frontend.history',[
            #'title'=>'history_title',
            #'description'=>'history_description',
        ]);
    }
    public function contact(){

        return view('frontend.contact',[
            'title'=>'contact_title',
            'description'=>'contact_description',
        ]);
    }

    public function error(){

        return view('frontend.error',[
            'title'=>'error_title',
            'description'=>'error_description',
        ]);
    }


    public function painel(){

        return view('frontend.painel');
    }

}
