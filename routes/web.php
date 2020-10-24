<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'prefix'=>'auth',
    'namespace'=>'\App\Http\Controllers'
],function(){
    Route::get('/login','LoginController@login')->name('login');
    Route::get('/logout','LoginController@logout')->name('logout');
});


Route::group([
    'prefix'=>'admin',
    'namespace'=>'\App\Http\Controllers',
    'middleware'=>'admin_loggued'
],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/donations','DonationsAdminController@index')->name('donations_admin');
    Route::get('/clans','ClansController@index')->name('clans');

    Route::get('/players','PlayersController@index')->name('players');

    // Servers
    Route::get('/servers','ServersController@index')->name('servers');
    Route::get('/server/create','ServersController@create')->name('server_create');
    Route::get('/server/modify/{id}','ServersController@modify')->name('server_modify');
    Route::get('/server/destroy/{id}','ServersController@destroy')->name('server_destroy');
});
