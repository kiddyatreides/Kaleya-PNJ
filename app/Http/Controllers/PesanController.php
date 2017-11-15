<?php

namespace App\Http\Controllers;

use App\modelPesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class PesanController extends Controller
{
    public function index()
    {
    	return view('frontend.pesan');
    }

    public function create(request $request)
    {
    	return $request->all();
    }

    public function messagePost(Request $request){
        try{
            $data = new modelPesan();
            $data->pengirim_id = Session::get('id');
            $data->penerima_id = $request->idPenerima;
            $data->pesan = $request->message;
            $file = $request->file('lampiran');
            if(!empty($file)){
                $ext = $file->getExtension();
                $name = time().'.'.$ext;
                $file->move('uploads/acara',$name);
                $data->lampiran = $name;
                $data->url_lampiran = url('uploads/acara/').$name;
            }
            else{
                $data->lampiran = null;
                $data->url_lampiran = null;
            }


            if($data->save()){
                return back()->with('sweet-alert','<script> window.onload = swal ( "Sukses" ,  "Kamu berhasil mengirimkan pesan!" ,  "success" )</script>');
            }
            else{
                return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Pengiriman pesan gagal!" ,  "error" )</script>');
            }
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
}
