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
            <div class="fichaalbum">
                <img class="fichaalbum" width="100%" src="img/vibras.jpg"></img>
                <div class="tituloficha">Vibras</div>
                <div class="artistaficha">J Balvin</div>
            </div>
        </div>
        <div class="etiquetascatalogo">
                <div class="tituloindextags mb-3" style="color:black"> 
                <i class="bi bi-tags"></i> XÉNEROS
                </div>
            <a href=""><button class="xenero blanco">POP</button></a>
        </div>
    </div>
</div>

@stop