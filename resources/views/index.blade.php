@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div class="indexportada">
    <div class="indexesquerda"><br>
        <div class="tituloindexesquerda">
            PLAYDISK é o lugar onde podes  
            <span
            class="txt-rotate"
            data-period="500"
            data-rotate='[ "escoitar", "mercar", "compartir", "ordenar"]'></span>
            <br>a túa música favorita
</div><br>
        <span class="subtituloindexesquerda">
            Únete á nosa comunidade e participa na conversa
        </span><br><br>
        <button class="botonindexesquerda">Comezar</button>
    </div>
    <div class="svgdereita">

    </div>
</div>
<div class="indextrending">
    <div class="tituloindextrending"> 
    <i class="bi bi-arrow-up-right-circle"></i> TRENDING
    </div>
    <div class="trend" id="trend1">
        <div class="trendingesquerda">
            <div class="posicion">01</div>
            <!--<img class="trendingportada" src="img/vibras.png"></img> -->
        </div>
        <div class="trendingtexto">
            <div class="trendingtitulo">Vibras</div>
            <div class="artista">J Balvin</div>
        </div>
    </div>
   
</div>
<div class="indexbuscador">
        <input type="text" class="indexbuscador" placeholder="Busca aquí por artista o álbum">
        
</div>
<div class="indextags">
    <div class="tituloindextags"> 
    <i class="bi bi-tags"></i> XÉNEROS
    </div>
    <div class="indexxeneros my-4">
        <a href=""><button class="xenero blanco">POP</button></a>
    </div>
</div>

<div class="novidades">
<div class="tituloindexnovidades"> 
<i class="bi bi-plus-circle"></i> NOVIDADES
    </div>
    <div class="novidade" id="novidade1">
        <div class="novidadeesquerda">
            <div class="posicion">01</div>
            <!--<img class="trendingportada" src="img/vibras.png"></img> -->
        </div>
        <div class="novidadetexto">
            <div class="novidadetitulo">Vibras</div>
            <div class="novidadeartista">J Balvin</div>
        </div>
    </div>
</div>
@stop