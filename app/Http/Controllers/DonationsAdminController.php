<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;

class DonationsAdminController extends Controller
{
    public function index(){
        return view('admin.donations.index');
    }

    public function search(){
        $Query = Profiles::where('nickname','like','%'.request()->get('q').'%');
        return response()->json([
            'total_count'=>$Query->count(),
            'results'=> collect( $Query->get() ) ->map(function ($obj){
                return [
                    'id'=>$obj->id,
                    'text'=>$obj->nickname,
                ];
            })->toArray(),
        ]);
    }

    public function create(){
        return view('admin.donations.create');
    }

    public function confirmPayment( $id ){
        return view('admin.donations.confirm',[
            'id_payment'=>$id
        ]);
    }
}
