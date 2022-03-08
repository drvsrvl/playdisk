@extends('layouts.master')
@section('title', 'lista')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
<div class="contidolista mt-2 pt-2">

    <div class="infolista" style="justify-content:start; height:100px">
        <h3>Configuración > <a class="blanco" href="/lista/{{$lista->id}}">{{$lista->titulo}}</a></h3>
    </div>
    <hr/>
    <div class="infolista mt-3" style="width:100%; height:350px">

        <form action="/lista/config/{{$lista->id}}" method="post" enctype="multipart/form-data" style="width:100%;">
                @csrf
                <div style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                    <h5>Título</h5>
                    <input 
                        class="mx-4"
                        type="text" 
                        style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                        value="{{$lista->titulo}}"
                        name="titulo"
                    >
                    <h5 class="mx-2">Foto</h5>
                    <input 
                        type="file"
                        class="mx-4"
                        style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                        name="foto"
                    >
                </div> 
                <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                    <h5 class="mx-4">Descripción</h5>
                    <textarea
                        style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                        rows="2"
                        width="100%"
                        cols="50"
                        name="descripcion"
                    >{{$lista->descripcion}}</textarea>
                </div>
                <div class="pb-4" style="display:flex;width:100%;justify-content:center">
                    <button 
                        type="submit"
                        style="padding:10px 15px 10px 15px;background-color:black;color:white;border-radius:20px;border:1px solid grey"
                        name="enviar"
                    >Enviar</button>
                </div>
                <a href="/lista/eliminar/{{$lista->id}}" class="text-center"><h5 class="divconfig rojo">Eliminar esta lista</h5></a>
            </form>
    </div>
    <hr/>
    <div class="cancionslista">
        @foreach($lista->cancions as $cancion)
        <div style="display:flex;align-items:center;justify-content:center;width:100%;">
            <div class="playlistcancion" onmouseover="play({{$cancion->id}});" onmouseout="dontplay({{$cancion->id}});" >
                <div class="esquerdaplaylist" style="width:50%;overflow:hide">
                <span class="play">
                            <h2 id="numCancion{{$cancion->id}}" class="numCancion show">{{1}}</h2>
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
            <div class="divconfig" onclick="window.location.href='/desvincular/{{$cancion->id}}/{{$lista->id}}'">
                <h3><i class="bi bi-trash-fill"></i></h3>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@stop