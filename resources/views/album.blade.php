@extends('layouts.master')
@section('title'){{$produto->nome}}@stop
@section('contido')
<div class="infoalbum" id="infoalbum">
    <div class="portada" >
        <div class="titulo">
            <span class="tituloalbum">{{$produto->nome}}</span>
            <span class="artista">@foreach($produto->artistas as $artista)<a href="/artista/{{$artista->id}}">{{$artista->nome}}</a> @endforeach</span>
        </div>
        <img src="/img/caratula/{{$produto->caratula}}" id="img" width="50%"></img>
        <span class="desc">Universal Music - 2018</span>
    </div>
    <div class="albumtexto">
            <h2 class="titulo">Tracklist</h2>
            <div class="tracklist">
                @foreach($produto->cancions as $cancion)
                <div class="cancion" id="cancion1" onmouseover="play(1);" onmouseout="dontplay(1);">
                    <span class="play">
                        <h2 id="numCancion1" class="numCancion show">{{$cancion->numero_produto}}</h2>
                        <h2 id="simPlay1" class="simPlay">▶︎</h2>
                    </span>
                    <span class="medio">
                        <span class="titulocancion">{{$cancion->nome}}</span>
                        <a href="/artista/{{$artista->id}}"><span class="autorcancion">{{$cancion->artistas}}</span></a>
                    </span>
                    <div class="duracion">{{$cancion->duracion}}</div>
                    <div class="menutrack" 
                    @if(Auth::user())
                        onclick="verlistas({{$cancion->id}})"
                    @endif
                    >
                        <h1>+</h1>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
<div class="informacionalbum">
    <div class="descripcion">
        <div class="my-3 mx-3">
            <h2>Descripción</h2>
            <div class="xeneros">
                @foreach($produto->xeneros as $xenero)
                <a href="/xenero/{{$xenero->id}}"><button class="xenero" class="ml-2"><?php echo strtoupper($xenero->nome); ?></button></a>
                @endforeach
            </div>
            <div class="my-2 mr-4">
                {{$produto->descripcion}}
            </div>
        </div>
    </div>
    <div class="mercar">
        <div class="my-3">
            <h2>Mercar</h2>
            <table class="prezo">
                @foreach($produto->formatos as $formato)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$formato->nome}}</td>
                    <td>{{$formato->prezo}} €</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div style="width:100%;background-color:white">
    <div class="comentarios pb-4">
        <form method="post" action="/album/{{$produto->id}}">
            @csrf
            <textarea name="comentario" class="comentario" placeholder="Escrebe aquí o teu comentario..."></textarea>
            <button type="submit" class="enviar">Enviar</button>
        </form>
    </div>
        <div style="width:60%;margin:0 auto" class="pb-5">
        @foreach($produto->comentarios as $comentario)
            <div style="display:flex;align-items:center" class="py-1" 
                @if(Auth::user()->perfil->id == $comentario->perfil->id)
                onmouseover="eliminarcomentario({{$comentario->id}})" onmouseout="outeliminarcomentario({{$comentario->id}})"
                @endif
            > 
                <div style="width:50px;height:50px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
                    ">
                    <img class="perfilfoto" src="/img/perfil/{{$comentario->perfil->foto}}"></img>
                </div>
                <div class="px-3" style="display:flex;flex-direction:column;align-items:start;width:100%;">
                    <div style="display:flex;align-items:center; justify-content:space-between; width:100%">
                        <div>
                            <a style="font-weight:600" href="/perfil/{{$comentario->perfil->id}}">&#64{{$comentario->perfil->login}}</a> ・ <span style="color:grey">{{$comentario->data}}</span>
                        </div>  
                        <div>
                            <a id="eliminarcomentario{{$comentario->id}}" class="divconfig rojo notshow" style="font-size:12px" href="/comentario/eliminar/{{$comentario->id}}">Eliminar comentario</a>
                        </div>
                    </div> 
                    <div style="">
                        {{$comentario->comentario}}
                    </div>
                </div>
            </div>
    @endforeach
        </div>
</div>


@include('layouts.scriptlistas')

<script>
    $(window).ready(function(){
        
        var sourceImage = document.getElementById("img");
        var colorThief = new ColorThief();
        var color = colorThief.getColor(sourceImage);
        document.getElementById("infoalbum").style.background = "linear-gradient(200deg, rgb(" + color + ") 0%, white 300%)";
        /*document.getElementById("menu").style.backgroundColor = "rgb(" + color + ")";*/

        
    });
</script>

@stop