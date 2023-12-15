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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',"VoitureController@login");
Route::get('/loginf',"VoitureController@index");
Route::get('/index',"VoitureController@indexx");
Route::get('/edit/{id}',"VoitureController@edit");
Route::get('/show/{id}',"VoitureController@Show");
Route::get('/create',"VoitureController@create");
Route::post('/store',"VoitureController@store");
Route::post('/update/{id}',"VoitureController@update");
Route::get('/destroy/{id}',"VoitureController@destroy");
Route::get('/deconnect',"VoitureController@deconnect");

Route::get('/listeClient',"ClientController@listeClient");
Route::get('/createclient',"ClientController@createclient");
Route::post('/storeclient',"ClientController@storeclient");  
Route::get('/editclient/{idc}',"ClientController@editclient");
Route::post('/updateclient/{idc}',"ClientController@updateclient");
Route::get('/destroyclient/{idc}',"ClientController@destroyclient");
Route::get('/clientinfo/{idc}',"ClientController@clientinfo");
Route::get('/ajoutAchat/{id}',"VoitureController@ajoutAchat");
Route::post('/validerAchat/{id}',"VoitureController@validerAchat");
Route::get('/indexvente',"VoitureController@indexvente"); 
Route::get('/destroyvente/{id}',"VoitureController@destroyvente"); 