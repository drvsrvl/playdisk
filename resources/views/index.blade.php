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
        <a href="/register"><button class="botonindexesquerda">Comezar</button></a>
    </div>
    <div class="svgdereita">
        <img src="img/svg/compose.svg"></img>
    </div>
</div>
<div class="indextrending">
    <div class="tituloindextrending"> 
    <i class="bi bi-arrow-up-right-circle"></i> TRENDING
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
            <a class="blanco" href="/xenero/{{$xenero->id}}"><button class="xenero blanco"><?php echo strtoupper($xenero->nome); ?></button></a>
        @endforeach
    </div>
</div>

<div class="novidades">
<div class="tituloindexnovidades"> 
<i class="bi bi-plus-circle"></i> NOVIDADES
    </div>
    @for ($i = 0; $i <= 0; $i++) 
        
        <div class="novidade" id="novidade{{$ultimosProdutos[$i]->id}}" onclick="link('album',{{$ultimosProdutos[$i]->id}})">
            <div class="novidadeesquerda">
                <div class="posicion">0{{$i+1}}</div>
                <!--<img class="trendingportada" src="img/vibras.png"></img> -->
            </div>
            <div class="novidadetexto">
                <div class="novidadetitulo">{{$ultimosProdutos[$i]->nome}}</div>
                @foreach($ultimosProdutos[$i]->artistas as $artista)
                    <a href="/artista/{{$artista->id}}"><div class="novidadeartista">{{$artista->nome}}</div></a>
                @endforeach
            </div>
        </div>
       
    @endfor
</div>

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