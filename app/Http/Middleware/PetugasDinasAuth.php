<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class PetugasDinasAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    
        if( Auth::check() )
        {
            // if user is not admin take him to his dashboard


            if ( Auth::user()->isKepalaBidang() ) {
                return redirect(route('kepala_bidang_dashboard'));
           }

            // allow admin to proceed with request
            else if ( Auth::user()->isPetugasDinas() || Auth::user()->status='aktif' ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }

    
}
