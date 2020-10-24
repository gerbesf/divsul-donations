<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use App\Models\Servers;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index(){
        return view('admin.players.index');
    }
    public function create(){
        return view('admin.players.create');
    }
    public function modify( $id ){
        return view('admin.players.modify',[
            'server_id' => $id
        ]);
    }
    public function destroy( $id ){
        return view('admin.players.destroy',[
            'server_id' => $id
        ]);
    }
    public function destroyAction( $id ){
        Profiles::where('id',$id)->update([
            'deleted'=>true
        ]);
    }
}
