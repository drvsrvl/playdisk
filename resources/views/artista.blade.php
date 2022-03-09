@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div style="width=100%; background: linear-gradient(180deg, grey 0%, rgb(0, 0, 0) 90%);">
<br/><br/>
    <div class="perfilinfo" style="height:170px">
        <div style="width:120px;height:120px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
            border: 1.5px solid black;">
            <img class="perfilfoto" src="/img/artista/{{$artista->foto}}"></img>
        </div>
        <h3 class="perfilnome mx-3" style="font-size:40px">{{$artista->nome}}</h3>
    </div>
    <div class="informacionperfil">
        <div class="descripcionperfil">
            <div class="py-3 mx-3">
                <h2>Descripción</h2>
                <div class="py-2 mr-4">
                    {{$artista->descripcion}}
                </div>
            </div>
        </div>
        <div class="listasperfil py-4 pb-6">
            <div class="py-3 mx-3" style="display:flex;align-items:center;justify-content:space-between">
                <h2>Álbumes</h2>
            </div>
            <div class="mx-3" style="width:100%;margin:0 auto;display:flex;justify-content:center">
            @foreach($artista->produtos as $produto)
                <div class="fichaalbum" style="width:200px" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <div class="artistaficha">{{$artista->nome}}</div>
                    @endforeach
                </div>
            @endforeach
            </div>  
        </div>
        <br/><br/>
    </div>
@stop
