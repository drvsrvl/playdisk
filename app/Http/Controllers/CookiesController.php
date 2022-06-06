<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CookiesController extends Controller
{
    public function update()
    {
        $caducidad = time() + (60 * 60 * 24 * 365);
        setcookie('aceptaCookies', '1', $caducidad, '/');
        return back();
    }
}