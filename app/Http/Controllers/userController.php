<?php

namespace App\Http\Controllers;

use App\modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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

    public function login(){
        return view('frontend.register-login.login');
    }

    public function loginPost(Request $request){
        $input = Input::all();
        $email = $request->email;
        $password = $request->password;

        $data = ModelUser::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id',$data->id);
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                if($input['tipe'] == "penyedia"){
                    //input kode disini
                }
                else{
                    return redirect('home');
                }
            }
            else{
                return redirect('login')->with('alert-success','<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
            }
        }
        else{
            return redirect('login')->with('alert-success','<script> window.onload = swal ( "Oops !" ,  "Password atau Email kamu Salah!" ,  "error" )</script>');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

//    public function register(Request $request){
//        return view('frontend.register-login.register');
//    }

    public function registerPost(Request $request){
        try{
            $this->validate($request, [
                'name' => 'required|min:4',
                'email' => 'required|min:4|email|unique:users',
                'phone' => 'required|min:4',
                'address' => 'required',
                'password' => 'required',
                'confirmation' => 'required|same:password',
            ]);

            $data =  new modelUser();
            $data->nama = $request->name;
            $data->email = $request->email;
            $data->alamat = $request->address;
            $data->nohp = $request->phone;
            $data->tipe = $request->type;
            $data->password = bcrypt($request->password);
            if($data->save()){
                return back()->with('alert-success','<script> window.onload = swal("Sukses!", "Berhasil Daftar !", "success")</script>');
            }
            else{
                return back()->with('alert-success','<script> window.onload = swal ( "Oops !" ,  "Gagal Daftar!" ,  "error" )</script>');
            }

        }
        catch (Exception $e){
            return back()->with('alert-success',$e->getMessage());
        }
    }

    public function test(){
        return redirect('/login')->with('alert-success','<script> window.onload = swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>');
    }
}
