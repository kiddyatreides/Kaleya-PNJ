<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class smsController extends Controller
{
    //

    public function store(Request $request){
        try{
            $to = $request->input('nohp');
            $pesan = $request->input('pesan');

            $secret = '145b65bbc129f3e6';
            $key = 'e2b75407';

            $basic  = new \Nexmo\Client\Credentials\Basic($key, $secret);
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $to,
                'from' => 'Kiddy Ganteng',
                'text' => $pesan
            ]);

            if($message){
                $data['message'] = "ok";
                return response($data);
            }
            else{
                $data['message'] = "bad";
                return response($data);
            }
        }
        catch (Exception $e){
            return response($e->getMessage());
        }
    }

    public function getData(){
        return response('ok');
    }

    public function testGetData(){
        $client = new \GuzzleHttp\Client();

    }

    public function sendSms(Request $request){
        $to = $request->input('nohp');
        $pesan = $request->input('pesan');

        $secret = '6iz1mp';
        $key = 'secret';

        $ch = curl_init(); //buat resourcce cURL
        $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$secret&passkey=$key&nohp=$to&pesan=$pesan";
        //set opsi URL dan opsi FOLLOWLOCATION
        curl_setopt($ch, CURLOPT_URL, $url);

        //dapatkan halaman URL
        curl_exec($ch);

        print_r(curl_getinfo($ch));

    }
}
