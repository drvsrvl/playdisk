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
use App\Http\Controllers\LocalizationController;
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
//ruta de localización
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->middleware('lang');
//ruta de vista detalle do álbum
Route::get('/album/{id}', [ProdutoController::class, 'show']);
//ruta post da vista detalle de álbum para enviar un comentario
Route::post('/album/{id}', [ComentarioController::class, 'store']);
//ruta get de reproducir para abrir o reproductor
Route::get('/reproducir', [CancionController::class, 'reproducir']);

/*Route::get('/reproducirSeguinte', [CancionController::class, 'reproducirSeguinte']);*/
//ruta de eliminar un comentario
Route::get('/comentario/eliminar/{id}', [ComentarioController::class, 'destroy']);
//inicio
Route::get('/', [ProdutoController::class, 'inicio'])->middleware('lang');
//buscador en grande do inicio
Route::get('buscadorindex', [ProdutoController::class, 'buscadorindex']);
//buscador pequeno do menú
Route::get('/buscadormenu', [ProdutoController::class, 'buscadormenu']);
//filtro dos álbumes da vista catálogo 
Route::get('/filtrocatalogo', [ProdutoController::class, 'filtrocatalogo']);
//vista detalle do artista
Route::get('/artista/{id}', [ArtistaController::class, 'show']);
//vista detalle do perfil
Route::get('/perfil/{id}', [PerfilController::class, 'show']);
//eliminar perfil
Route::get('/perfil/eliminar/{id}', [PerfilController::class, 'destroy']);
//configurar perfil
Route::get('/config/{id}', [PerfilController::class, 'edit']);
//enviar os datos de configurar perfil
Route::post('/config/{id}', [PerfilController::class, 'update']);
//vista de administrador
Route::get('/admin', [PerfilController::class, 'adminpanel'])->middleware('admin');

//Rutas de edición de artista por parte do administrador

Route::get('/admin/artistas', [ArtistaController::class, 'admin'])->middleware('admin');

Route::get('/admin/artista/{id}', [ArtistaController::class, 'edit'])->middleware('admin');

Route::post('/admin/artista/{id}', [ArtistaController::class, 'update'])->middleware('admin');

Route::get('/admin/artista', [ArtistaController::class, 'create'])->middleware('admin'); //novo artista

Route::post('/admin/artista', [ArtistaController::class, 'store'])->middleware('admin');

Route::get('/artista/eliminar/{id}', [ArtistaController::class, 'destroy'])->middleware('admin');

//Rutas de edición de álbum por parte do administrador

Route::get('/admin/albumes', [ProdutoController::class, 'admin'])->middleware('admin');

Route::get('/admin/album/{id}', [ProdutoController::class, 'edit'])->middleware('admin');

Route::post('/admin/album/{id}', [ProdutoController::class, 'update'])->middleware('admin');

Route::get('/admin/album', [ProdutoController::class, 'create'])->middleware('admin');

Route::post('/admin/album', [ProdutoController::class, 'store'])->middleware('admin');

Route::get('/album/eliminar/{id}', [ProdutoController::class, 'destroy'])->middleware('admin');


//Rutas de edición de canción (a vista está no álbum)

Route::post('/admin/cancion', [CancionController::class, 'store'])->middleware('admin');

//Rutas de edición de usuarios por parte do administrador

Route::get('/admin/perfils', [PerfilController::class, 'index'])->middleware('admin');

Route::get('/admin/perfil/{id}', [PerfilController::class, 'adminedit'])->middleware('admin');

Route::post('/admin/perfil/{id}', [PerfilController::class, 'adminupdate'])->middleware('admin');

Route::get('/admin/perfil/eliminar/{id}', [PerfilController::class, 'destroy'])->middleware('admin');

//Rutas de edición de xénero

Route::get('/admin/xenero', [XeneroController::class, 'admin'])->middleware('admin');

Route::post('/admin/xenero', [XeneroController::class, 'store'])->middleware('admin');

//Nova lista por parte do usuario
Route::get('/listanova', [ListaController::class, 'create'])->middleware('auth');

Route::post('/listanova', [ListaController::class, 'store'])->middleware('auth');

//vista detalle da vista
Route::get('/lista/{id}', [ListaController::class, 'show']);
//configuración da vista
Route::get('/lista/config/{id}', [ListaController::class, 'edit']);
//envío de datos da configuración da vista
Route::post('/lista/config/{id}', [ListaController::class, 'update']);
//eliminar vista
Route::get('/lista/eliminar/{id}', [ListaController::class, 'destroy']);
//vincular canción con lista a través da vista do álbum
Route::get('/vincular/{cancionid}/{listaid}', [ListaController::class, 'vincular']);
//desvincular a través da configuración da lista
Route::get('/desvincular/{cancionid}/{listaid}', [ListaController::class, 'desvincular']);
//ruta de cesta
Route::get('/cesta', [CestaController::class, 'index'])->middleware('auth');
//ruta de pedidos
Route::get('/pedidos', [PedidoController::class, 'show'])->middleware('auth');
//impresión de factura
Route::get('/factura/{id}', [PedidoController::class, 'factura'])->middleware('auth');
//ruta de envío de pedido
Route::post('/pedido', [PedidoController::class, 'store'])->middleware('auth');
//engadimos á cesta
Route::post('/cesta/engadir', [CestaController::class, 'store'])->middleware('auth');
//quitamos da cesta
Route::post('/cesta/quitar', [CestaController::class, 'quitar'])->middleware('auth');
//vista de catálogo
Route::get('/catalogo', [ProdutoController::class, 'index']);
//vista de catálogo filtrada polo xénero
Route::get('/catalogo/{xenero}', [XeneroController::class, 'show']);
//vista de inicio desde login
Route::get('/dashboard', [ProdutoController::class, 'inicio'])
->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
