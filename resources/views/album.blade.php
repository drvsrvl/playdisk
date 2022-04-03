@extends('layouts.master')
@section('title'){{$produto->nome}}@stop
@section('contido')

<div class="infoalbum" id="infoalbum" style="user-select:none;">
    <div class="portada" >
        <div class="titulo">
            <span class="tituloalbum">{{$produto->nome}}</span>
            <span class="artista">@foreach($produto->artistas as $artista)<a href="/artista/{{$artista->id}}">{{$artista->nome}}</a> @endforeach</span>
        </div>
        <img src="/img/caratula/{{$produto->caratula}}" id="imgportada" width="50%"></img>
        <span class="desc">Universal Music - 2018</span>
    </div>
    <div class="albumtexto">
            <h2 class="titulo">Tracklist</h2>
                <input type="hidden" id="espazo" value=""><!-- comment -->
                <input type="hidden" id="idCancion" value=""><!-- comment -->
                <input type="hidden" id="idEspazo" value=""><!-- comment -->
            <input id="idcancion" type="hidden" value="">
            <div class="tracklist">
                @foreach($produto->cancions as $cancion)
                <div class="cancion" id="cancion{{$cancion->id}}" onmouseover="play({{$cancion->id}});" onmouseout="dontplay({{$cancion->id}});"
                    @if(Auth::user()) onclick="reproducir({{$cancion->id}})" @else onclick="showError()" @endif>
                    <input type="hidden" id="playing{{$cancion->id}}" value="false">
                    <span class="play">
                        <h2 id="numCancion{{$cancion->id}}" class="numCancion show">{{$cancion->numero_produto}}</h2>
                        <h2 id="simPlay{{$cancion->id}}" class="simPlay" style="margin-top:3px;">▶︎</h2>
                        <h2 id="pause{{$cancion->id}}" class="simPlay" style="margin-top:3px;"><i class="bi bi-pause-fill"></i></h2>
                    </span>
                    <span class="medio">
                        <span class="titulocancion">{{$cancion->nome}}</span>
                        @foreach($cancion->artistas as $artista)
                            <a href="/artista/{{$artista->id}}"><span class="autorcancion">{{$artista->nome}}</span></a>
                        @endforeach
                    </span>
                    <div class="duracion">{{$cancion->duracion}}</div>
                    <div id="menutrack{{$cancion->id}}" class="menutrack" 
                    @if(Auth::user())
                        onclick="verlistas({{$cancion->id}})"
                    @endif
                    >
                        <h1 class="mb-1" style="margin-top:2px;">+</h1>
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
                <a href="/catalogo/{{$xenero->id}}"><button class="xenero" class="ml-2"><?php echo strtoupper($xenero->nome); ?></button></a>
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
                <tr @if(Auth::user()) onclick="formatoCesta({{$produto->id}}, {{$formato->id}})" @else onclick="showError()" @endif>
                    <input type="hidden" id="produto_id" value="">
                    <td>{{$produto->nome}}</td>
                    <td>{{$formato->nome}}</td>
                    <td>{{$formato->pivot->prezo}} €</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div style="width:100%;background-color:white">
    <div class="comentarios pb-4">
        @if(Auth::user())
        <form method="post" action="/album/{{$produto->id}}">
            @csrf
            <textarea name="comentario" class="comentario" id="comentario" placeholder="Escrebe aquí o teu comentario..."></textarea>
            <button type="button" class="enviar" onclick="novoComentario()">Enviar</button>
        </form>
        @else
        <p class="text-center"><a href="/login">Inicia sesión</a> ou <a href="/register">rexístrate</a> para deixar un comentario</p>
        @endif
    </div>
        <div style="width:60%;margin:0 auto" class="pb-5">
            <div style="width:100%;" id="novoComentario"></div>
        @foreach($produto->comentarios->sortByDesc('data') as $comentario)
            <div style="display:flex;align-items:center;width:100%;" class="py-2" 
                @if(Auth::user() && Auth::user()->perfil->id == $comentario->perfil->id)
                onmouseover="eliminarcomentario({{$comentario->id}})" onmouseout="outeliminarcomentario({{$comentario->id}})"
                @endif
            > 
                <div style="width:50px;height:50px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
                    " onclick="link('perfil',{{$comentario->perfil->id}});">
                    <img class="perfilfoto link" src="/img/perfil/{{$comentario->perfil->foto}}"></img>
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
        <div id="espazoreproductor" style="width:100%">
        </div>
</div>
<div class="mensaxeerro" id="mensaxeerrodiv">
<div id="mensaxeerro"
    style="width:50%;background-color:black;position:fixed;bottom:40px;left:300px;z-index:4;color:white;border-radius:10px;
    display:flex;justify-content:center;align-items:center;padding:10px;">
    Debes iniciar sesión para realizar esta acción
</div>
</div>

@include('layouts.scriptlistas')

<script>
    
    function novoComentario() {
        var comentario = $('#comentario').val();
        var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
        var data={comentario:comentario,_token:token};
        $.ajax({
            type: "post",
            url: "/album/{{$produto->id}}",
            data: data,
            success: function (data) {
                $("#novoComentario").fadeIn();
                document.getElementById('novoComentario').innerHTML += data;

            }
        });
    };
    
    function formatoCesta(produtoid, formatoid) {
        var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
        var data={produto_id:produtoid, formato_id:formatoid, _token:token};
        $.ajax({
            type: "post",
            url: "/cesta/engadir",
            data: data,
            success: function (data) {
                var notificacion = document.getElementById('notificacionmenu');
                notificacion.innerHTML = parseInt(notificacion.innerHTML) + 1;
         
            }
        });
    };

    function showError() {
        $("#mensaxeerrodiv").toggleClass('show');
            $('#mensaxeerro').fadeOut(2000, () => { $("#mensaxeerrodiv").removeClass('show'); $('#mensaxeerro').fadeIn(100);});
    }

    document.getElementById("infoalbum").style.background = "linear-gradient(200deg, lightgrey 0%, white 150%)";
     $(window).ready(function(){
        var sourceImage = document.getElementById("imgportada");
        var colorThief = new ColorThief();
        var color = colorThief.getColor(sourceImage);
        if(color) {
        document.getElementById("infoalbum").style.background = "linear-gradient(200deg, rgb(" + color + ") 0%, white 300%)";
        /*document.getElementById("menu").style.backgroundColor = "rgb(" + color + ")";*/
        }
        });
</script>

@stop