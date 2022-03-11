<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Perfil;
use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
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

    public function vincular($cancionid, $listaid) {
        $lista = Lista::find($listaid);
        if($lista->perfil->id == Auth::user()->perfil->id) {
            $cancion = Cancion::find($cancionid);
            $lista->cancions()->attach($cancion);
            return redirect()->action([ProdutoController::class, 'show'], ['id' => $cancion->produto->id]); //rediriximos á vista detallada do nodo co id indicado
        } else return abort(403, 'Acción non autorizada');
    }


    public function desvincular($cancionid, $listaid) {
        $lista = Lista::find($listaid);
        if($lista->perfil->id == Auth::user()->perfil->id) {
            $cancion = Cancion::find($cancionid);
            $lista->cancions()->detach($cancion);
            return redirect()->action([ListaController::class, 'edit'], ['id' => $listaid]); //rediriximos á vista detallada do nodo co id indicado
        } else return abort(403, 'Acción non autorizada');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listanova');
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
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        if($validated) { //no caso de ser válidos
            $lastID = Lista::latest('id')->first()->id; //Buscamos o último id de lista (a que acabamos de crear) para ensinalo
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "lista" . $lastID+1;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/lista'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            } else $nomefoto = 'default.jpg';
            DB::insert('insert into listas (titulo, foto, descripcion, perfil_id) values (?, ?, ?, ?)',
                [
                    $request->titulo,
                    $nomefoto,
                    $request->descripcion,
                    Auth::user()->perfil->id
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            $lastID++;
            return redirect()->action([ListaController::class, 'show'], ['id' => $lastID]); //rediriximos á vista detallada do nodo co id indicado
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);
        return view('lista', ['lista' => $lista]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lista = Lista::find($id);
        if($lista->perfil->id == Auth::user()->perfil->id) {
            return view('listaconfig', ['lista' => $lista]);
        } else return abort(403, 'Acción non autorizada');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ //validamos os campos
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        if($validated) { //no caso de ser válidos
            $lista = Lista::find($id); //buscamos o nodo con esa id
            $nomefoto = $lista->foto; //recuperamos o valor do nome da imaxe
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "lista" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/lista'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            } 
            DB::update('update listas set titulo=?, foto=?, descripcion=? where id="' . $id . '"',
                [
                    $request->titulo,
                    $nomefoto,
                    $request->descripcion,
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            return redirect()->action([ListaController::class, 'show'], ['id' => $id]); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = Lista::find($id);
        if($lista->perfil->id == Auth::user()->perfil->id) {
            $lista->delete(); //eliminamos o nodo atopado a través da id
            return redirect()->action([PerfilController::class, 'show'], ['id' => Auth::user()->perfil->id]);
        }
        else return abort(403, 'Acción non autorizada');
    }
}
