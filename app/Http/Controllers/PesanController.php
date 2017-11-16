<?php

namespace App\Http\Controllers;

use App\modelPesan;
use App\modelPesanHeader;
use App\modelUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

    public function getDetailMessage($kode){
        try{
            $getPesan = modelPesan::where('kode',$kode)->orderBy('created_at','desc')->get();
            $data = [
              'modalpesan' => $getPesan
            ];
            return view('frontend.user.detail_pesan',$data);
        }
        catch (Exception $exception){
            return response($exception->getMessage());
        }
    }

    public function inboxUser(){
        try{
            $pesan = DB::table('pesan')
                ->select('id','penerima_id','pengirim_id','acara_id','pesan','lampiran','url_lampiran','created_at')
                ->where('penerima_id', Session::get('id'))
                ->groupBy('id','acara_id','penerima_id','pengirim_id','pesan','lampiran','url_lampiran','created_at')
                ->orderBy('created_at','desc')
                ->limit(1)
                ->get();

            $data = [
                'pesan' => $pesan
            ];
            return view('frontend.user.pesan_masuk', $data);

        }
        catch(Exception $e){
            return response($e->getMessage());
        }
    }

    public function sentUser(){
        try{
            $pesan = DB::table('pesan')
                ->select('id','penerima_id','pengirim_id','acara_id','pesan','lampiran','url_lampiran','created_at','kode')
                ->where('pengirim_id', Session::get('id'))
                ->groupBy('id','acara_id','penerima_id','pengirim_id','pesan','lampiran','url_lampiran','created_at','kode')
                ->orderBy('created_at','desc')
                ->limit(1)
                ->get();

            $data = [
                'pesan' => $pesan
            ];
            return view('frontend.user.pesan_keluar', $data);

        }
        catch(Exception $e){
            return response($e->getMessage());
        }
    }

    public function messagePost(Request $request){
        try{
            $header = new modelPesanHeader();
            $kode = rand(123000,560000);
            $header->kode = $kode;

            if($header->save()){
                $data = new modelPesan();
                $data->acara_id = $request->idAcara;
                $data->pengirim_id = Session::get('id');
                $data->penerima_id = $request->idPenerima;
                $data->pesan = $request->message;
                $file = $request->file('lampiran');
                if(!empty($file)){
                    $ext = $file->getClientOriginalExtension();
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
            else{

            }
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function messageReply(Request $request){
        try{
            $data = new modelPesan();
            $data->acara_id = $request->idAcara;
            $data->pengirim_id = Session::get('id');
            $data->penerima_id = $request->idPenerima;
            $data->kode = $request->kode;
            $data->pesan = $request->message;
            $file = $request->file('lampiran');
            if(!empty($file)){
                $ext = $file->getClientOriginalExtension();
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
