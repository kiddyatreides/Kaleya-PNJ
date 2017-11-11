<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Model\acara;
use Illuminate\Http\Request;

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
        return view('kaleya.acara.show',compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kaleya.acara.addacara');    }

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
        $acara ->judul = $request ->judul;
        $acara ->deskripsi = $request ->deskripsi;
        $acara ->tanggal_mulai = $request ->tanggal_mulai;
        $acara ->tanggal_berakhir = $request ->tanggal_berakhir;
        $acara ->alamat = $request ->alamat;
        $acara ->statusSponsor = $request ->statusSponsor;
        $acara ->statusMediaPartner = $request ->statusMediaPartner;
        $acara ->statusOpenBooth = $request ->statusOpenBooth;
        $acara ->harga_tiket = $request ->harga_tiket;
        $acara ->jumlah_tiket = $request ->jumlah_tiket;

        $acara -> save();

        return redirect(route('acara.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}