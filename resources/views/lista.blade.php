@extends('layouts.master')
@section('title', 'lista')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
<div class="contidolista">
    <div class="infolista">
        <img src="/img/lista/{{$lista->foto}}" alt="" class="imglista" height="100%"></img>
        <div style="display:flex;flex-direction:column;justify-content:start" class="mx-4">
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
    </div>
    <hr/>
    <div class="cancionslista">
        @foreach($lista->cancions as $cancion)
            <div class="playlistcancion" onmouseover="play({{$cancion->id}});" onmouseout="dontplay({{$cancion->id}});">
                <div class="esquerdaplaylist">
                <span class="play">
                            <h2 id="numCancion{{$cancion->id}}" class="numCancion show">{{1}}</h2>
                            <h2 id="simPlay{{$cancion->id}}" class="simPlay">▶︎</h2>
                        </span>
                    <img class="imaxeplaylist" height="100%" src="img/album/{{$cancion->produto->caratula}}"></img>
                    <div class="tituloplaylistperfil">{{$cancion->nome}}</div>
                </div>
                <div class="dereitaplaylist">
                    <a style="blanco" href="/album/{{$cancion->produto->id}}"><div class="perfilplaylist">{{$cancion->produto->nome}}</div></a>
                    <div class="numcancionsplaylist">{{$cancion->duracion}}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

@stop