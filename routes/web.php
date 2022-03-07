<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/album', function () {
    return view('album');
});

Route::get('/artista', function () {
    return view('artista');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/lista', function () {
    return view('lista');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
