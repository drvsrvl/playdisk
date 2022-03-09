<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminnovoartista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ //validamos os campos
            'nome' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        if($validated) { //no caso de ser válidos
            $lastID = Artista::latest('id')->first()->id; //Buscamos o último id de lista (a que acabamos de crear) para ensinalo
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "artista" . $lastID+1;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/artista'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            } else $nomefoto = 'default.ppg';
            DB::insert('insert into artistas (nome, foto, descripcion) values (?, ?, ?)',
                [
                    $request->nome,
                    $nomefoto,
                    $request->descripcion
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
                return redirect()->action([ArtistaController::class, 'admin']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::find($id);
        return view('artista', ['artista' => $artista]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */

    public function admin() {
        $artistas = Artista::all();
        return view('adminartistas', ['artistas' => $artistas]);
    }

    public function edit($id)
    {
        $artista = Artista::find($id);
        return view('admineditartista', ['artista' => $artista]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ //validamos os campos
            'nome' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        if($validated) { //no caso de ser válidos
            $artista = Artista::find($id); //buscamos o nodo con esa id
            $nomefoto = $artista->foto; //recuperamos o valor do nome da imaxe
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "artista" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/artista'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            }
            DB::update('update artistas set nome=?, foto=?, descripcion=? where id="' . $id . '"',
                [
                    $request->nome,
                    $nomefoto,
                    $request->descripcion,
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            return redirect()->action([ArtistaController::class, 'admin']); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artista $artista)
    {
        //
    }
}
