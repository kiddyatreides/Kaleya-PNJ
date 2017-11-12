<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'kaleya';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     protected function credentials(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(count($user)){
            if ($user->tipe ==2){
                return ['email' =>'inactive','password'=>'You are a normal user, not allowed login here'];
            }
            else{
                return ['email' => $request->email,'password'=>$request->password,'tipe'=>1];
            }
        }
        return $request->only($this->username(), 'password');
    }
}
