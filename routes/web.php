<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\XeneroController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\CestaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PedidoController;
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

Route::get('/reproducir', [CancionController::class, 'reproducir']);

Route::get('/comentario/eliminar/{id}', [ComentarioController::class, 'destroy']);

Route::get('/', [ProdutoController::class, 'inicio']);

Route::get('buscadorindex', [ProdutoController::class, 'buscadorindex']);

Route::get('/buscadormenu', [ProdutoController::class, 'buscadormenu']);

Route::get('/filtrocatalogo', [ProdutoController::class, 'filtrocatalogo']);

Route::get('/artista/{id}', [ArtistaController::class, 'show']);

Route::get('/perfil/{id}', [PerfilController::class, 'show']);

Route::get('/perfil/eliminar/{id}', [PerfilController::class, 'destroy']);

Route::get('/config/{id}', [PerfilController::class, 'edit']);

Route::post('/config/{id}', [PerfilController::class, 'update']);

Route::get('/admin', [PerfilController::class, 'adminpanel'])->middleware('admin');

//Rutas de edición de artista por parte do administrador

Route::get('/admin/artistas', [ArtistaController::class, 'admin'])->middleware('admin');

Route::get('/admin/artista/{id}', [ArtistaController::class, 'edit'])->middleware('admin');

Route::post('/admin/artista/{id}', [ArtistaController::class, 'update'])->middleware('admin');

Route::get('/admin/artista', [ArtistaController::class, 'create'])->middleware('admin'); //novo artista

Route::post('/admin/artista', [ArtistaController::class, 'store'])->middleware('admin');

//Rutas de edición de álbum por parte do administrador

Route::get('/admin/albumes', [ProdutoController::class, 'admin'])->middleware('admin');

Route::get('/admin/album/{id}', [ProdutoController::class, 'edit'])->middleware('admin');

Route::post('/admin/album/{id}', [ProdutoController::class, 'update'])->middleware('admin');

Route::get('/admin/album', [ProdutoController::class, 'create'])->middleware('admin'); //novo artista

Route::post('/admin/album', [ProdutoController::class, 'store'])->middleware('admin');


//Rutas de edición de canción

Route::post('/admin/cancion', [CancionController::class, 'store'])->middleware('admin');

//Rutas de edición de usuarios por parte do administrador

Route::get('/admin/perfils', [PerfilController::class, 'index'])->middleware('admin');

Route::get('/admin/perfil/{id}', [PerfilController::class, 'adminedit'])->middleware('admin');

Route::post('/admin/perfil/{id}', [PerfilController::class, 'adminupdate'])->middleware('admin');

Route::get('/admin/xenero', [XeneroController::class, 'admin'])->middleware('admin');

Route::post('/admin/xenero', [XeneroController::class, 'store'])->middleware('admin');

Route::get('/listanova', [ListaController::class, 'create'])->middleware('auth');

Route::post('/listanova', [ListaController::class, 'store'])->middleware('auth');

Route::get('/lista/{id}', [ListaController::class, 'show']);

Route::get('/lista/config/{id}', [ListaController::class, 'edit']);

Route::post('/lista/config/{id}', [ListaController::class, 'update']);

Route::get('/lista/eliminar/{id}', [ListaController::class, 'destroy']);

Route::get('/vincular/{cancionid}/{listaid}', [ListaController::class, 'vincular']);

Route::get('/desvincular/{cancionid}/{listaid}', [ListaController::class, 'desvincular']);

Route::get('/artista', function () {
    return view('artista');
});

Route::get('/cesta', [CestaController::class, 'index'])->middleware('auth');

Route::post('/pedido', [PedidoController::class, 'store'])->middleware('auth');

Route::post('/cesta/engadir', [CestaController::class, 'store'])->middleware('auth');

Route::post('/cesta/quitar', [CestaController::class, 'quitar'])->middleware('auth');

Route::get('/catalogo', [ProdutoController::class, 'index']);

Route::get('/catalogo/{xenero}', [XeneroController::class, 'show']);

Route::get('/lista', function () {
    return view('lista');
});

Route::get('/dashboard', [ProdutoController::class, 'inicio'])
->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
