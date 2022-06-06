<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;


class LocalizationController extends Controller
{
    public function index($locale)
     {
         App::setLocale($locale); //cambiamos o valor en App de Locale
        //  Session::put('locale',$locale); //grabámolo na sesión
         session()->put('locale', $locale);
         return redirect()->back(); //e volvemos á páxina anterior
     }


}
