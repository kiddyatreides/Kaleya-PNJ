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

Route::post('sendSms','smsController@store');
Route::post('sendSms2','smsController@sendSms');
Route::get('data','smsController@getData');
Route::get('test','smsController@testGetData');

Route::get('/', function () {
    return view('frontend.homepage.index');
});

Route::get('kaleya', function () {
    return view('kaleya.home');
});

Route::get('kaleya/acaras', function () {
    return view('kaleya.acara.show');
});

Route::get('kaleya/addacara', function () {
    return view('kaleya.acara.addacara');
});

Route::resource('kaleya/acara','Acara\acaraController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
