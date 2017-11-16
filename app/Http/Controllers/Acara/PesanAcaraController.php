<?php

namespace App\Http\Controllers\Acara;

use App\modelPesan;
use App\modelUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class PesanAcaraController extends Controller
{
    public function index()
    {
    	return view('kaleya.pesan.listpesan');
    }

    public function create(request $request)
    {
    	return $request->all();
    }

    public function getDetailMessage($id){
        try{
            $real_id = base64_decode($id);

            $getPesan = modelPesan::where('id',$real_id)->get();

            foreach ($getPesan as $datas){
                $pengirim = $datas->pengirim_id;
                $penerima = $datas->penerima_id;
                $acara = $datas->acara_id;
            }

            $pesanDetail = modelPesan::where('acara_id',$acara)
                ->orWhere('penerima_id',$penerima)
                ->orWhere('pengirim_id',$pengirim)
                ->orderBy('created_at', 'asc')
                ->get();


            $data = [
              'pesan' => $pesanDetail,
              'modalpesan' => $getPesan,
            ];

            return view('kaleya.pesan.pesan',$data);
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
            return view('kaleya.pesan.addpesan', $data);

        }
        catch(Exception $e){
            return response($e->getMessage());
        }
    }

    public function sentUser(){
        try{
            $pesan = DB::table('pesan')
                ->select('id','penerima_id','pengirim_id','acara_id','pesan','lampiran','url_lampiran','created_at')
                ->where('pengirim_id', Session::get('id'))
                ->groupBy('id','acara_id','penerima_id','pengirim_id','pesan','lampiran','url_lampiran','created_at')
                ->orderBy('created_at','desc')
                ->limit(1)
                ->get();

            $data = [
                'pesan' => $pesan
            ];
            return view('kaleya.acara.listpesan', $data);

        }
        catch(Exception $e){
            return response($e->getMessage());
        }
    }

    public function messagePost(Request $request){
        try{
            $data = new modelPesan();
            $data->acara_id = $request->idAcara;
            $data->pengirim_id = Session::get('id');
            $data->penerima_id = $request->idPenerima;
            $data->pesan = $request->message;
            $file = $request->file('lampiran');
            if(!empty($file)){
                $ext = $file->getClientOriginalExtension();
                $name = time().'.'.$ext;
                $file->move('uploads/acara/',$name);
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