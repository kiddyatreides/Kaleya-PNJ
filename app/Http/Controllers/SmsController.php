<?php

namespace App\Http\Controllers;

use App\modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Twilio\Rest\Client;

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

            $this->send(Session::get('email'));

            $message = $client->message()->send([
                'to' => "+6282213308462",
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

    public function sentSMS(){
        $client = new \GuzzleHttp\Client();
        $message  = $client->request('POST', 'https://api.mainapi.net/smsnotification/1.0.0/messages', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type'     => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer 8e9dfdfd04c9519ad09deca43c30b8c3'
            ],
            'form_params' => array(
                'msisdn' => +"+6282213308462",
                'content' => 'Terimakasih telah mendaftar ke KALEYA. Kami akan mengingatkan kamu untuk datang ke acara yang kamu minta saat H-2 Acara.',
            )
        ]);

        if($message){
            return back()->with('sweet-alert','<script> window.onload = swal("Sukses!", "Berhasil Kirim Pesan !", "success")</script>');
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Gagal Kirim Pesan!" ,  "error" )</script>');
        }
    }

    public function twillioSMS(){
        // Use the REST API Client to make requests to the Twilio REST API


        // Your Account SID and Auth Token from twilio.com/console
        $sid = 'AC230f977dae927fcb291c33c44585584d';
        $token = 'a7f8831113dceed368254c6444f00fc4';
        $client = new Client($sid, $token);

        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
        // the number you'd like to send the message to
            '+6282213308462',
            array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+18312186296 ',
                // the body of the text message you'd like to send
                'body' => 'Terimakasih telah mendaftar ke KALEYA. Kami akan mengingatkan kamu untuk datang ke acara yang kamu minta saat H-2 Acara.'
            )
        );
    }

    public function send($email)
    {
        try{
            $data = modelUser::where('email',$email)->first();

            $sending = Mail::send('email', ['nama' => $data->nama], function ($message) use ($data)
            {
                $message->subject('Pengingat Kaleya');
                $message->from('donotreply@kaleya.id', 'Kaleya');
                $message->to($data->email);
            });
        }
        catch (Exception $e){
            $promotion = $e->getMessage();
            return response()->json($promotion);
        }
    }

}
