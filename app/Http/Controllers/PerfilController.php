<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdutoController;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfils = Perfil::all();
        return view('adminusuarios', ['perfils' => $perfils]);
    }

    public function adminpanel() {
        return view('admin');
    }
    
    public function adminedit($id) {
        $perfil = Perfil::find($id);
        return view('admineditusuario', ['perfil' => $perfil]);
    }
    public function adminupdate(Request $request, $id)
    {
        $validated = $request->validate([ //validamos os campos
            'login' => 'required|string',
            'descripcion' => 'required|string',
            'rol' => 'required|string'
        ]);
        if($validated) { //no caso de ser válidos
            $perfil = Perfil::find($id); //buscamos o nodo con esa id
            $nomefoto = $perfil->foto; //recuperamos o valor do nome da imaxe
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "perfil" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension";
                $foto->move(public_path('img/perfil'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            }
            DB::update('update perfils set login=?, foto=?, descripcion=?, rol=? where id="' . $id . '"',
                [
                    $request->login,
                    $nomefoto,
                    $request->descripcion,
                    $request->rol
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            return redirect()->action([PerfilController::class, 'index']); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = Perfil::find($id);
        return view('perfil', ['perfil' => $perfil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->perfil->id == $id) {//se o usuario é o que está en sesión
            $perfil = Perfil::find($id);
            return view('perfilconfig', ['perfil' => $perfil]); //devolvémoslle a vista de edición
        } else return abort(403, 'Acción non autorizada');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ //validamos os campos
            'login' => 'required|string',
            'descripcion' => 'required|string',
            'direccion' => 'string'
        ]);
        if($validated) { //no caso de ser válidos
            $perfil = Perfil::find($id); //buscamos o nodo con esa id
            $nomefoto = $perfil->foto; //recuperamos o valor do nome da imaxe
            if($request->hasfile('foto')){
                $foto = $request->file('foto');
                $nome = "perfil" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/perfil'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            }
            empty($request->direccion) ? $direccion=null : $direccion = $request->direccion;
            DB::update('update perfils set login=?, foto=?, descripcion=?, direccion=? where id="' . $id . '"',
                [
                    $request->login,
                    $nomefoto,
                    $request->descripcion,
                    $direccion
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            return redirect()->action([PerfilController::class, 'show'], ['id' => $id]); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->perfil->id == $id) {
            $perfil = Perfil::find($id);
            $user = User::find($perfil->usuario->id);
            $perfil->delete();
            $user->delete();
            return redirect()->action([ProdutoController::class, 'inicio']);
        } else return abort(403, 'Acción non autorizada');
    }
}
