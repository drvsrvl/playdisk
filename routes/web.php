<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ListaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/album/{id}', [ProdutoController::class, 'show']);

Route::get('/', [ProdutoController::class, 'inicio']);

Route::get('/artista/{id}', [ArtistaController::class, 'show']);

Route::get('/perfil/{id}', [PerfilController::class, 'show']);

Route::get('/lista/{id}', [ListaController::class, 'show']);

Route::get('/artista', function () {
    return view('artista');
});

Route::get('/catalogo', [ProdutoController::class, 'index']);

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/lista', function () {
    return view('lista');
});


require __DIR__.'/auth.php';
