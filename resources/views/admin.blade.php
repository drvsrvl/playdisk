@extends('layouts.master')
@section('title', 'index')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
        <div class="infolista" style="justify-content:start; height:100px">
            <h3>Panel de administrador</h3>
        </div>
    <hr/>
    <div class="cancionslista px-4" style="display:flex;justify-content:space-between;align-items:center">
        <div class="my-4">
            <a class="blanco" href="/admin/artistas"><h3>Administrar artistas</h3></a>
            <br/>
            <a class="blanco" href="/admin/albumes"><h3>Administrar álbumes</h3></a>
        </div>
        <div>
            <a class="blanco" href="/admin/usuarios"><h3>Administrar usuarios</h3></a>
            <br/>
            <a class="blanco" href="/admin/xeneros"><h3>Administrar xéneros</h3></a>
        </div>
    </div>
    
</div>
<br/>

@stop