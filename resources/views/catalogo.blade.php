@extends('layouts.master')
@section('title', 'index')
@section('contido')

<div class="cabeceiracatalogo">
    <h2 class="titulocabeceiracatalogo">CATÁLOGO</h2>
</div>

<div class="corpocatalogo py-3">
    <div class="filtrocatalogo">
        <h3>Filtrar por: </h3>
        <select class="seleccionfiltro mx-3">
            <option selected="selected">ÚLTIMOS ENGADIDOS</option> 
            <option>MELLOR PUNTUACIÓN</option>
            <option>ORDE ALFABÉTICA</option>
        </select>
    </div>
    <div class="divcorpocatalogo">
        <div class="albumescatalogo py-4">
            @foreach($produtos as $produto)
                <div class="fichaalbum" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <a href="/artista/{{$artista->id}}" style="color:white;"><div class="artistaficha">{{$artista->nome}}</div></a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="etiquetascatalogo">
                <div class="tituloindextags mb-3" style="color:black"> 
                <i class="bi bi-tags"></i> XÉNEROS
                </div>
                @foreach($xeneros as $xenero)
                    <a href="/xenero/{{$xenero->id}}"><button class="xenero blanco"><?php echo strtoupper($xenero->nome); ?></button></a>
                @endforeach
        </div>
    </div>
</div>

@stop