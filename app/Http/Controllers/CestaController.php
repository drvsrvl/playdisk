<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cesta = Cesta::find(Auth::user()->perfil->cesta->id);
        return view('cesta', ['cesta' => $cesta]);
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
        $cesta = Auth::user()->perfil->cesta;
        foreach($cesta->produtos as $produto) { //por cada produto
            foreach($produto->formatos as $formato) { //e por cada formato do produto
                $produto_id = $produto->id;
                if($formato->id == $produto->pivot->formato_id) { //se coincide este formato co que se atopa na táboa pivote entre este produto e a cesta
                    $formato_id = $formato->id; //almacenamos os valores
                    $cantidade = intval($produto->pivot->cantidade);
                        if($formato->id == $request->formato_id && $produto_id == $request->produto_id) {
                          DB::update('update cesta_produto set cantidade=? where (cesta_id="' . $cesta->id . '") and (formato_id="' . $formato_id . '") and (produto_id="' . $produto_id . '")',
                            [
                                $cantidade+1
                            ]); //e sumamos unha cantidade na táboa pivote entre a cesta e o produto
                          return view('taboacesta', ['cesta' => Auth::user()->perfil->cesta]); //e devolvemos a vista para que a recolla a través de AJAX
                        }
                }
                    
            }
        }
            DB::insert('insert into cesta_produto (cesta_id, produto_id, cantidade, formato_id) values (?, ?, ?, ?)',
                [
                    $cesta->id,
                    $request->produto_id,
                    1,
                    $request->formato_id
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicado
            return true;
    }
    
    public function quitar(Request $request)
    {
        $cesta = Auth::user()->perfil->cesta;
        foreach($cesta->produtos as $produto) {//por cada produto
            foreach($produto->formatos as $formato) { //e formato do produto
                $produto_id = $produto->id;
                if($formato->id == $produto->pivot->formato_id) { //se coinciden
                    $formato_id = $formato->id;
                    $cantidade = intval($produto->pivot->cantidade);
                    if($formato->id == $request->formato_id && $produto_id == $request->produto_id) { //e se é a que queremos borrar
                        if($cantidade - 1 != 0) {
                          DB::update('update cesta_produto set cantidade=? where (cesta_id="' . $cesta->id . '") and (formato_id="' . $formato_id . '") and (produto_id="' . $produto_id . '")',
                            [
                                $cantidade-1
                            ]); //quitamos un valor na bbdd
                        } else { 
                            DB::delete('delete from cesta_produto where (cesta_id="' . $cesta->id . '") and (formato_id="' . $formato_id . '") and (produto_id="' . $produto_id . '")');
                        } //se é menor de un, borrámolo
                    }
                }
                    
            }
        }
        return view('taboacesta', ['cesta' => Auth::user()->perfil->cesta]); //devolvemos a vista para que a recolao AJAX
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function show(Cesta $cesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cesta $cesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cesta $cesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cesta  $cesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cesta $cesta)
    {
        //
    }
}
