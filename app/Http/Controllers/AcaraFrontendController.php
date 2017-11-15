<?php

namespace App\Http\Controllers;

use App\modelAcara;
use App\modelReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class acaraFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = modelAcara::all();

        $data = [
            'user' => $user
        ];
        return view('frontend.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $idasli = base64_decode($id);
        $data = new modelReview();
        $data->user_id = Session::get('id');
        $data->event_id = $idasli;
        $data->pesan = $request->message;
        if($data->save()){
            return back()->with('sweet-alert','<script> window.onload = swal("Sukses!", "Berhasil Mereview Terimakasih!!", "success")</script>');
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal("Oops!", "Gagal Menambahkan Review!", "error")</script>');
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
        $idasli = base64_decode($id);
        $acara = modelAcara::where('id',$idasli)->get();
        $review = modelReview::where('event_id',$idasli)->get();
        $data = [
            'acaras' => $acara,
            'review' => $review
        ];
        if(count($data) > 0){
            return view('frontend.acara.show',$data);
        }
        else{
            return back()->with('sweet-alert','<script> window.onload = swal ( "Oops !" ,  "Kami tidak dapat menemukan data tersebut!!" ,  "error" )</script>');
        }
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
