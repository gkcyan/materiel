<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
//use Illuminate\Contracts\Session\Session;
//use App\Http\Controllers\LocalizationController;
//use Illuminate\Http\Request;

use Closure;




class Localization
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

        //if ( Session::has('lang'))
        
        if ($request->session()->has('lang')) 
        {
            // Récupération de la 'lang' dans Session et activation
            App::setLocale(Session()->get('lang'));
        }
 
        return $next($request);
    }
}
