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

    //frontend
    Route::get('home','AcaraFrontendController@index');
    Route::get('home/pesan','PesanController@sentUser');
    Route::get('acara/{id}','AcaraFrontendController@show');
    Route::get('pesan/detail/{kode}','PesanController@getDetailMessage');
    Route::post('reviewPost/{id}','AcaraFrontendController@store');
    Route::post('messagePost','PesanController@messagePost');
    Route::post('messageReply','PesanController@messageReply');
    Route::post('messageAcaraReply','PesanAcaraController@messageAcaraReply');
    Route::get('smsNotification','SmsController@store');
    Route::get('sentSMS','SmsController@sentSMS');
    Route::get('twillioSMS','SmsController@twillioSMS');

    //backend
    Route::get('kaleya/home','Acara\HomeController@index')->name('kaleya.home');

//    Route::get('kaleya/acara','Acara\AcaraController@index');
//    Route::get('kaleya/acara/create','Acara\AcaraController@create');

    Route::prefix('kaleya')->group(function (){
        Route::resource('acara','Acara\acaraController');
        Route::resource('pesan','Acara\PesanAcaraController');
    });


});

Route::get('login','userController@login');
Route::get('logout','userController@logout');

Route::post('loginPost','userController@loginPost');
Route::post('registerPost','userController@registerPost');

Route::get('/', function () {
    return view('frontend.homepage.index');
});


//Route::get('/pesan2', function () {
//    return view('frontend.user.pesan');
//});
//
//Route::get('/detaill', function () {
//    return view('frontend.user.detail_pesan');
//});
//
//
//Route::get('getmessage','PesanController@getMessage');
//Route::get('test','userController@test');
//
//
////Route::get('/acarad', function () {
////    return view('frontend.acara.show');
////});
//
//Route::get('/dashboard', function () {
//    return view('frontend.user.index');
//});
//Route::get('kaleya', function () {
//    return view('kaleya.home');
//});
//Route::get('kaleya/acaras', function () {
//    return view('kaleya.acara.show');
//});
//Route::get('kaleya/addacara', function () {
//    return view('kaleya.acara.addacara');
//});
//Route::get('listpesanacara', function () {
//    return view('kaleya.pesan.listpesan');
//});
//Route::get('pesanacara', function () {
//    return view('kaleya.pesan.pesan');
//});
//Route::get('addpesanacara', function () {
//    return view('kaleya.pesan.addpesan');
//});
//Route::resource('kaleya/acara','Acara\acaraController');
////pesan controller
//Route::get('pesan','PesanController@index');
//Route::post('pesan','PesanController@create');