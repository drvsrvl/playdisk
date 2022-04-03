@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div style="width:100%;background: linear-gradient(180deg, rgb(197, 202, 231) 0%, rgb(53, 52, 107) 70%, rgb(0, 0, 0) 100%);">

    <h2 class="titulocabeceiracatalogo text-center py-3">CATÁLOGO</h2>
<div class="corpocatalogo py-3">
    <div class="filtrocatalogo">
            <a href="/catalogo"><button class="xenero blanco"><?php echo strtoupper($xeneroBuscado->nome); ?><i class="bi bi-x"></i></h3></button></a>
    </div>
    <div class="divcorpocatalogo">
        <div id="albumescatalogo" class="albumescatalogo py-4" 
            style="display:flex; align-items:center">
            @foreach($produtos as $produto)
                <div class="fichaalbum mx-3" style="height:200px" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum py-2" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha" style="font-size:15px;">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <a href="/artista/{{$artista->id}}" style="color:white;"><div class="artistaficha" style="font-size:13px;">{{$artista->nome}}</div></a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="etiquetascatalogo">
                <div class="tituloindextags mb-3" style="color:black"> 
                <i class="bi bi-tags"></i> XÉNEROS
                </div>
                @foreach($xeneros as $xenero)
                    <a href="/catalogo/{{$xenero->id}}"><button class="xenero blanco my-1"><?php echo strtoupper($xenero->nome); ?></button></a>
                @endforeach
        </div>
    </div>
</div>
</div>

@stop