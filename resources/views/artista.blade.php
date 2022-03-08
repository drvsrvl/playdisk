@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div class="artistainfo">
    <div style="width:200px;height:200px;overflow:hidden;display:inline-block;position:relative;border-radius:50%">
        <img class="artistafoto" src="/img/artista/{{$artista->foto}}"></img>
    </div>
    <h3 class="artistanome mx-5">{{$artista->nome}}</h3>
</div>
<div class="informacionartista mb-1">
    <div class="descripcionartista">
        <div class="my-3 mx-3">
            <h2>Descripción</h2>
            <div class="my-2 mr-4">
                {{$artista->descripcion}}
            </div>
        </div>
    </div>
    <div class="albumesartista">
        <div class="my-3">
            <h2>Álbumes</h2>
        </div>
        <div class="divfichas">
            @foreach($artista->produtos as $produto)
                <div class="fichaalbum" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <div class="artistaficha">{{$artista->nome}}</div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop