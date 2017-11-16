<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Model\acara;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class acaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = acara::all();
        $user = User::all();
        $acara = [
            'user' => $user
        ];
        return view('kaleya.acara.show',compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kaleya.acara.addacara');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
            'alamat' => 'required',
            'harga_tiket' => 'required|numeric',
            'jumlah_tiket' => 'required|numeric',
        ]);
        $tanggal_mulai = date("Y-m-d");
        $tanggal_berakhir = date("Y-m-d");
        $acara = new acara;
        $acara->user_id = Session::get('id');
        $acara ->judul = $request ->judul;
        $acara ->deskripsi = $request ->deskripsi;
        $file = $request->file('foto');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/foto',$newName);
        $acara->foto = $newName;
        $urlfoto = url('uploads/foto/').$newName;
        $acara->urlfoto = $urlfoto;
        $acara ->tanggal_mulai = $request ->tanggal_mulai;
        $acara ->tanggal_berakhir = $request ->tanggal_berakhir;
        $acara ->alamat = $request ->alamat;

        if(empty($request ->statusSponsor)){
            $acara ->statusSponsor = 0;
        }
        else{
            $acara ->statusSponsor = $request ->statusSponsor;
        }
        if(empty($request ->statusMediaPartner)){
        $acara ->statusMediaPartner = 0;
        }
        else{
            $acara ->statusMediaPartner = $request ->statusMediaPartner;
        }
        if(empty($request ->statusOpenBooth)){
            $acara ->statusOpenBooth = 0;
        }
        else{
            $acara ->statusOpenBooth = $request ->statusOpenBooth;
        }

        $acara ->harga_tiket = $request ->harga_tiket;
        //$acara ->user_id = 41; error child and parrent constraint
        $acara ->jumlah_tiket = $request ->jumlah_tiket;

        if($acara->save()){
            return back()->with('sweet-alert','<script> window.onload = swal("Sukses!", "Acara Telah Ditambahkan!!", "success")</script>');
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal("Oops!", "Gagal Menambahkan Acara!", "error")</script>');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $acara = acara::where('id',$id) ->first();
        return view('kaleya.acara.edit',compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            //'tanggal_mulai' => 'required|date_format:"d-m-Y"',
            //'tanggal_berakhir' => 'required|date_format:"d-m-Y"',
            'alamat' => 'required',
            'harga_tiket' => 'required|numeric',
            'jumlah_tiket' => 'required|numeric',
        ]);
        $tanggal_mulai = date("Y-m-d");
        $tanggal_berakhir = date("Y-m-d");
        $acara = acara::find($id);
        $acara ->judul = $request ->judul;
        $acara ->deskripsi = $request ->deskripsi;
        if (empty($request->file('foto'))){
            $acara->foto = $acara->foto;
        }
        else{
            unlink('uploads/foto/'.$acara->foto); //menghapus file lama
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/foto',$newName);
            $acara->foto = $newName;
        }
        $acara ->tanggal_mulai = $request ->tanggal_mulai;
        $acara ->tanggal_berakhir = $request ->tanggal_berakhir;
        $acara ->alamat = $request ->alamat;

        if(empty($request ->statusSponsor)){
            $acara ->statusSponsor = 0;
        }
        else{
            $acara ->statusSponsor = $request ->statusSponsor;
        }
        if(empty($request ->statusMediaPartner)){
        $acara ->statusMediaPartner = 0;
        }
        else{
            $acara ->statusMediaPartner = $request ->statusMediaPartner;
        }
        if(empty($request ->statusOpenBooth)){
            $acara ->statusOpenBooth = 0;
        }
        else{
            $acara ->statusOpenBooth = $request ->statusOpenBooth;
        }

        $acara ->harga_tiket = $request ->harga_tiket;
        $acara ->jumlah_tiket = $request ->jumlah_tiket;

        if($acara->save()){
            return back()->with('sweet-alert','<script> window.onload = swal("Sukses!", "Acara Telah Diedit!!", "success")</script>');
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal("Oops!", "Gagal Edit Acara!", "error")</script>');
        }
        //return redirect(route('acara.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         acara::where('id',$id) ->delete();
        return redirect()->back();
    }
}
