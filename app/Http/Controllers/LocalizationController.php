<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Session\Session;


class LocalizationController extends Controller
{

    
    // la fonction getlang affiche le code de la langue active
    public function getLang() {
        return App::getLocale();
    }

    // la fonction setlang recupère la langue souhiatée et l'enregistre dans une variable session 'lang'
    public function setLang(Request $request, $lang){
        
        session()->put('lang', $lang);
        return redirect()->back();
    }

    
}
