<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;


class LocalizationController extends Controller
{
    public function index($locale)
     {
         App::setLocale($locale); //cambiamos o valor en App de Locale
         Session::put('locale',$locale); //grabámolo na sesión
         return redirect()->back(); //e volvemos á páxina anterior
     }


}
