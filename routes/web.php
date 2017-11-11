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
    return view('welcome');
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