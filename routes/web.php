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
//Route::post('sendSms','smsController@store');
//Route::post('sendSms2','smsController@sendSms');
use Illuminate\Support\Facades\Route;
Route::middleware(['checkLogin'])->group(function () {
    Route::get('home','AcaraFrontendController@index');
    Route::get('acara/{id}','AcaraFrontendController@show');
    Route::post('reviewPost/{id}','AcaraFrontendController@store');

    Route::get('logout','userController@logout');
});

Route::get('/', function () {
    return view('frontend.homepage.index');
});

Route::get('login','userController@login');
Route::post('loginPost','userController@loginPost');
Route::post('registerPost','userController@registerPost');

Route::get('test','userController@test');


//Route::get('/acarad', function () {
//    return view('frontend.acara.show');
//});

Route::get('/dashboard', function () {
    return view('frontend.user.index');
});

Route::get('acara/home','Acara\HomeController@index')->name('acara.home');

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
//pesan controller
Route::get('pesan','PesanController@index');
Route::post('pesan','PesanController@create');