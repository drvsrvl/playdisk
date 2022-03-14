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
        //
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
