@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div class="indexportada" style="position:relative;">
    <div class="indexesquerda" style="margin-top:-20px;"><br>
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
        <a href="/register"><button class="botonindexesquerda">Comezar</button></a>
    </div>
    <div class="svgdereita" style="width:43%;position:absolute;right:0">

            <img src="/img/svg/compose.svg" height="100%" ></img>
        
    </div>
</div>
<div class="indextrending">
    <div class="tituloindextrending"> 
    <i class="bi bi-arrow-up-right-circle"></i> POPULARES
    </div>
    <?php $cont = 1; ?>
    <div
        style="width:100%; display:flex; justify-content:start; align-items:center">
        @foreach($trending as $produto)
            <div class="trend" id="trend" onclick="link('album', {{$produto->id}})">
                <div class="trendingesquerda">
                    <div class="posicion">{{$cont}}</div>
                    <img class="trendingportada" src="img/caratula/{{$produto->caratula}}"></img> 
                </div>
                <div class="trendingtexto">
                    <div class="trendingtitulo">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <div class="artista">{{$artista->nome}}</div>
                    @endforeach
                </div>
            </div>
            <?php $cont++; ?>
        @endforeach
    </div>
</div>
<div class="indexbuscador">
        <input type="text" class="indexbuscador" id="indexbuscador" placeholder="Busca aquí por artista o álbum">
        <div style="width:67%;margin-top:-20px;padding-top:20px;padding-bottom:40px;position:relative;">
            <div class="divresultadosbuscador" id="divresultadosbuscador"></div>
        </div>
</div>
<div class="indextags">
    <div class="tituloindextags"> 
    <i class="bi bi-tags"></i> XÉNEROS
    </div>
    <div class="indexxeneros my-4">
       @foreach($xeneros as $xenero)
            <a class="blanco" href="/catalogo/{{$xenero->id}}"><button class="xenero blanco"><?php echo strtoupper($xenero->nome); ?></button></a>
        @endforeach
    </div>
</div>

<!--<div class="novidades" style="height:300px;">
    <div class="tituloindexnovidades my-3"> 
        <i class="bi bi-plus-circle"></i> NOVIDADES
    </div>
    @for ($i = 0; $i <= 0; $i++) 
        <div class="fichaalbum mx-3" onclick="link('album',{{$ultimosProdutos[$i]->id}})">
                    <img class="fichaalbum" width="100%" src="/img/caratula/{{$ultimosProdutos[$i]->caratula}}"></img>
                    <div class="tituloficha" style="font-size:15px;">{{$ultimosProdutos[$i]->nome}}</div>
                    @foreach($ultimosProdutos[$i]->artistas as $artista)
                        <a href="/artista/{{$artista->id}}" style="color:white;"><div class="artistaficha" style="font-size:13px;">{{$artista->nome}}</div></a>
                    @endforeach
    
        </div>
       
    @endfor
</div>-->

<script>
        $(document).ready(function() {
            $('#indexbuscador').on('keyup',function () {
                var buscar = $(this).val();
                var data={'nome':buscar};
                $.ajax({
                    type: "get",
                    url: "/buscadorindex",
                    data: data,
                    success: function (data) {
                        
                        document.getElementById('divresultadosbuscador').innerHTML = data;
                    }
                });
                if($(this).val() === "") document.getElementById('divresultadosbuscador').innerHTML = "";
            });
        });
</script>
@stop