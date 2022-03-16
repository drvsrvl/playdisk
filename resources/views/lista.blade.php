@extends('layouts.master')
@section('title', 'lista')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
<div class="contidolista mt-2 pt-2">
    <div class="infolista">
    <div style="width:120px;height:120px;overflow:hidden;display:inline-block;position:relative;border-radius:10%;">
        <img src="/img/lista/{{$lista->foto}}" alt="" class="imglista" height="100%"></img>
    </div>
        <div style="display:flex;flex-direction:column;justify-content:start;position:relative" class="mx-4">
            <h3 class="titulolista">{{$lista->titulo}}</h3>
            <div style="display:flex;justify-items:start; color:lightgrey">
                <a class="blanco" href="/perfil/{{$lista->perfil->id}}"><span class="autorlista">&#64{{$lista->perfil->login}}</span></a> ・ 
                <span class="numcancions">
                            <?php $numCancions = count($lista->cancions);
                                if($numCancions !== 1) {
                                    echo $numCancions . ' cancións';
                                } else echo $numCancions . ' canción';
                            ?>
                </span> ・ <span class="duracionlista"> X minutos</span>
            </div>
            <div class="descripcionlista mt-1" style="color:lightgrey">
                {{$lista->descripcion}}
            </div>
        </div>
        @if(Auth::user() && $lista->perfil->id == Auth::user()->perfil->id)
            <div
                class="divconfig"
                style="position:relative;top:0;right:0;"
                onclick="link('lista/config',{{$lista->id}});">
                <h3><i class="bi bi-gear-fill"></i></h3>
            </div>
        @endif
    </div>
    <hr/>
    <div class="cancionslista">
        <?php $contador = 1 ?>
        @foreach($lista->cancions as $cancion)
            <div class="playlistcancion my-2" onmouseover="play({{$cancion->id}});" onmouseout="dontplay({{$cancion->id}});" onclick="reproducir({{$cancion->id}})">
                <div class="esquerdaplaylist" style="width:50%;overflow:hide">
                <input type="hidden" id="playing{{$cancion->id}}" value="false">
                <span class="play">
                            <h2 id="numCancion{{$cancion->id}}" class="numCancion show">{{$contador}}</h2>
                            <h2 id="simPlay{{$cancion->id}}" class="simPlay">▶︎</h2>
                        </span>
                    <img class="imaxeplaylist" height="100%" src="/img/caratula/{{$cancion->produto->caratula}}"></img>
                    <div class="mx-4">{{$cancion->nome}}</div>
                </div>
                
                <div class="dereitaplaylist">
                    <a class="blanco" href="/album/{{$cancion->produto->id}}" ><div class="perfilplaylist">{{$cancion->produto->nome}}</div></a>
                    <div class="numcancionsplaylist">{{$cancion->duracion}}</div>
                </div>
            </div>
            <?php $contador++ ?>
        @endforeach
    </div>
</div>
</div>
<div id="espazoreproductor" style="width:100%">
</div>
@stop