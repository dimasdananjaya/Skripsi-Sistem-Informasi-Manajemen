<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; //penting
use Auth; //penting
use DB;
use User;

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


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function credentials(\Illuminate\Http\Request $request) {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 'aktif'];
    
            }

    protected function authenticated(Request $request, $user)
    {

     if ( Auth::user()->isKepalaBidang()) {
           return redirect(route('kepala_bidang_dashboard'));
      }

      if ( Auth::user()->isPetugasDinas() ) {
        return redirect(route('petugas_dinas_dashboard'));
     }

        abort(404);
    }

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

}
