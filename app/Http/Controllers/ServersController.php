<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;

class ServersController extends Controller
{
    public function index(){
        return view('admin.servers.index');
    }
    public function create(){
        return view('admin.servers.create');
    }
    public function modify( $id ){
        return view('admin.servers.modify',[
            'server_id' => $id
        ]);
    }
    public function destroy( $id ){
        return view('admin.servers.destroy',[
            'server_id' => $id
        ]);
    }
    public function destroyAction( $id ){
        Servers::where('id',$id)->delete();
    }
}
