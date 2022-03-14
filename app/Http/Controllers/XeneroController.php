<?php

namespace App\Http\Controllers;

use App\Models\Xenero;
use App\Models\Produto;
use Illuminate\Http\Request;

class XeneroController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Xenero  $xenero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $xenero = Xenero::find($id);
        $produtos = Produto::all();
        $produtosXenero = [];
        $xeneros = Xenero::all();
        foreach ($produtos as $produto) {
            foreach($produto->xeneros as $xeneroProd) {
                if($xeneroProd->id == $xenero->id) {
                    $produtosXenero[] = $produto;
                }
            }
        };
        return view('xenero', ['xeneroBuscado' => $xenero, 'produtos' => $produtosXenero, 'xeneros' => $xeneros]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Xenero  $xenero
     * @return \Illuminate\Http\Response
     */
    public function edit(Xenero $xenero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Xenero  $xenero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Xenero $xenero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Xenero  $xenero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Xenero $xenero)
    {
        //
    }
}
