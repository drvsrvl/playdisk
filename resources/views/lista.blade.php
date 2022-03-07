@extends('layouts.master')
@section('title', 'lista')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
<div class="contidolista">
    <div class="infolista">
        <img src="img/vibras.jpg" alt="" class="imglista" height="100%"></img>
        <div style="display:flex;flex-direction:column;justify-content:start" class="mx-4">
            <h3 class="titulolista">Lista #1</h3>
            <div style="display:flex;justify-items:start; color:lightgrey">
                <span class="autorlista">@autor</span> ・ <span class="numcancions">20 cancións</span> ・ <span class="duracionlista">22 minutos</span>
            </div>
            <div class="descripcionlista mt-1" style="color:lightgrey">
                Unha pequena descripción para a lista de máximo 150 caracteres.
            </div>
        </div>
    </div>
    <hr/>
    <div class="cancionslista">
        <div class="playlistcancion" onmouseover="play(1);" onmouseout="dontplay(1);">
            <div class="esquerdaplaylist">
            <span class="play">
                        <h2 id="numCancion1" class="numCancion show">1</h2>
                        <h2 id="simPlay1" class="simPlay">▶︎</h2>
                    </span>
                <img class="imaxeplaylist" height="100%" src="img/vibras.jpg"></img>
                <div class="tituloplaylistperfil">Vibras</div>
            </div>
            <div class="dereitaplaylist">
                <div class="perfilplaylist">@jbalvin</div>
                <div class="numcancionsplaylist">20 cancións</div>
            </div>
        </div>
    </div>
</div>
</div>

@stop