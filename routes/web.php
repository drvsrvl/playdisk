<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\ComentarioController;
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

Route::post('/album/{id}', [ComentarioController::class, 'store']);

Route::get('/comentario/eliminar/{id}', [ComentarioController::class, 'destroy']);

Route::get('/', [ProdutoController::class, 'inicio']);

Route::get('/artista/{id}', [ArtistaController::class, 'show']);

Route::get('/perfil/{id}', [PerfilController::class, 'show']);

Route::get('/perfil/eliminar/{id}', [PerfilController::class, 'destroy']);

Route::get('/config/{id}', [PerfilController::class, 'edit']);

Route::post('/config/{id}', [PerfilController::class, 'update']);

Route::get('/listanova', [ListaController::class, 'create']);

Route::post('/listanova', [ListaController::class, 'store']);

Route::get('/lista/{id}', [ListaController::class, 'show']);

Route::get('/lista/config/{id}', [ListaController::class, 'edit']);

Route::post('/lista/config/{id}', [ListaController::class, 'update']);

Route::get('/lista/eliminar/{id}', [ListaController::class, 'destroy']);

Route::get('/vincular/{cancionid}/{listaid}', [ListaController::class, 'vincular']);

Route::get('/desvincular/{cancionid}/{listaid}', [ListaController::class, 'desvincular']);

Route::get('/artista', function () {
    return view('artista');
});

Route::get('/catalogo', [ProdutoController::class, 'index']);

Route::get('/lista', function () {
    return view('lista');
});

Route::get('/dashboard', [ProdutoController::class, 'inicio'])
->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
