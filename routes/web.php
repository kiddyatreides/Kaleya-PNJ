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


Route::get('/', function () {
    return view('frontend.homepage.index');
});

Route::get('/dashboard', function () {
    return view('frontend.user.index');
});

Route::get('/login', function () {
    return view('frontend.register-login.index');
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

