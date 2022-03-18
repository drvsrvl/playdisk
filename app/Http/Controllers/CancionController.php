<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Produto;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CancionController extends Controller
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
        //
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
            'produtoid' => 'required',
            'posicion' => 'required',
            'arquivo' => 'required',
            'artistas' => 'required'
        ]);
        if($validated) { //no caso de ser válidos
            $id = Cancion::latest('id')->first()->id;
            $id++;
            if($request->hasfile('arquivo')){
                $arquivo = $request->file('arquivo');
                $nome = "cancion" . $id;
                $extension = $arquivo->guessExtension();
                $nomecancion = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $arquivo->move(public_path('cancions'),$nomecancion); //e movémola á carpeta de imaxes da entrada
            } else $nomecancion = 'default.mp3';
            DB::insert('insert into cancions (nome, produto_id, arquivo, numero_produto, reproduccions, duracion) values (?, ?, ?, ?, ?, ?, ?)',
                [
                    $request->nome,
                    $request->produtoid,
                    $nomecancion,
                    $request->posicion,
                    '0',
                    $request->duracion,
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            foreach($request->artista as $artista) {
                DB::insert('insert into artista_cancion (artista_id, cancion_id) values (?, ?)',
                [
                    intval($artista),
                    $lastID
                ]);
            }
            
            return redirect()->action([ProdutoController::class, 'admin']); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }

    public function reproducir(Request $request) {
        if($request->ajax()) {
            $cancion = Cancion::find($request->id);
            $cancion->reproduccions = intval($cancion->reproduccions) + 1;
            $cancion->save();
            return view('reproductor', ['cancion' => $cancion]);
        }
    }
    
    public function reproducirSeguinte(Request $request) {
        if($request->ajax()) {
            if($request->espazo == 'album') {
                $produto = Produto::find($request->idEspazo);
                foreach($produto->cancions as $cancionProd) {
                    if($cancionProd->id == $request->idCancion) {
                        $posicionAlbum = $cancionProd->pivot->posicion;
                    }
                }
                foreach($produto->cancions as $cancionProd) {
                    if($cancionProd->pivot->posicion == ($posicionAlbum + 1)) {
                        $cancion = Cancion::find($cancionProd->id);
                        $cancion->reproduccions = intval($cancion->reproduccions) + 1;
                        $cancion->save();
                    }
                }
                return view('reproductor', ['cancion' => $cancion]);
            }
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancion $cancion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancion $cancion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancion $cancion)
    {
        //
    }
}
