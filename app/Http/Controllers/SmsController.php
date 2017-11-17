<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class smsController extends Controller
{
    //

    public function store(){
        try{
            $to = Session::get('nohp');

            $secret = '145b65bbc129f3e6';
            $key = 'e2b75407';

            $basic  = new \Nexmo\Client\Credentials\Basic($key, $secret);
            $client = new \Nexmo\Client($basic);

            $pesan = "Terimakasih telah mendaftar ke KALEYA. Kami akan mengingatkan kamu untuk datang ke acara yang kamu minta saat H-2 Acara. \n \n";

            $message = $client->message()->send([
                'to' => $to,
                'from' => 'Kaleya',
                'text' => $pesan
            ]);

            if($message){
                return back()->with('sweet-alert','<script> window.onload = swal("Sukses!", "Berhasil Daftar !", "success")</script>');
            }
            else{
                return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Gagal Daftar!" ,  "error" )</script>');
            }
        }
        catch (Exception $e){
            return response($e->getMessage());
        }
    }

}
