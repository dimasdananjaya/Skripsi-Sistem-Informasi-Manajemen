<?php

namespace App\Http\Controllers\AuthPetugasUML;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //penting
use Illuminate\Support\Facades\Auth; //penting


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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */




    public function __construct()
    {
        $this->middleware('guest:petugas_uml')->except('logout');
    }

    public function showLoginForm(){
        return view('authPetugasUML.login');
    }
    

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $credential=[
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>'aktif'
        ];

        if(Auth::guard('petugas_uml')->attempt($credential,$request->member))
        {
            return redirect()->intended(route('petugas_uml_dashboard'));
        }

        else {
            return redirect()->back()->withInput($request->only('email'));
        }
    }
    
    public function logout(){
        Auth::guard('petugas_uml')->logout();
        //return view('authPetugasUML.login');
        return view('welcome');
    }

}
