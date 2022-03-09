@extends('layouts.master')
@section('title', 'configuración')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
        <div class="infolista" style="justify-content:space-between; height:100px">
            <h3><a class="blanco" href="/admin"><i class="bi bi-arrow-left"></i>Volver</a></h3>
            <h3>Administración de artistas </h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <div class="my-3" style="width:100%;display:flex;justify-content:final;">
            <div class="divconfig verde mr-4" onclick="window.location.href='/admin/artista'">
                <h5><i class="bi bi-plus-square-fill"></i> Novo artista</h5>
            </div>
        </div>
        <div class="albumescatalogo py-4" 
            style="display:flex; align-items:center">
        @foreach($artistas as $artista)
            <div class="fichaalbum mx-2" style="width:200px" onclick="link('admin/artista',{{$artista->id}})">
                <div style="width:80px;height:80px;overflow:hidden;display:inline-block;position:relative;border-radius:10%;
                ">
                    <img class="fichaalbum" width="100%" src="/img/artista/{{$artista->foto}}"></img>
                </div>
                    <div class="tituloficha">{{$artista->nome}}</div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<br/>

@stop