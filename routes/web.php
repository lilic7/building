<?php

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
    return view('index');
});


Route::get('/gallery', function() {
    return view('gallery');
});

Route::get('/contacts', function() {
    return view('contacts');
});

Route::get('/calc', 'CalcController@index');
Route::get('/ilc', 'CalcController@ilc');
Route::post('/ilc', 'CalcController@ilc_save');
Route::get('/sbt', 'CalcController@sbt');
Route::post('/sbt', 'CalcController@sbt_save');
Route::get('/dpr', 'CalcController@dpr');
Route::post('/dpr', 'CalcController@dpr_save');
Route::get('/cpc', 'CalcController@cpc');
Route::get('/delete', 'CalcController@delete_project');

Auth::routes();

Route::post('/loginGuest', 'Auth\LoginController@loginAsGuest');

Route::get('/home', 'HomeController@index')->name('home');
