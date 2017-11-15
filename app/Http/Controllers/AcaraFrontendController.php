<?php

namespace App\Http\Controllers;

use App\modelAcara;
use App\modelPesan;
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
        $review_user = modelReview::where('event_id',$idasli)->where('user_id',Session::get('id'))->get();
        $countdata = modelReview::where('event_id',$idasli)->count();
        $countpesan = modelPesan::where('acara_id',$idasli)->where('pengirim_id', Session::get('id'))->count();
        $recent = modelAcara::where('statusAcara', 1)->where('id', '!=' , $idasli)->orderBy('created_at', 'desc')->take(3)->get();

        $data = [
            'acaras' => $acara,
            'review' => $review,
            'review_user' => $review_user,
            'countdata' => $countdata,
            'countpesan' => $countpesan,
            'recent' => $recent
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
