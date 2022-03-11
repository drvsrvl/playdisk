<br/>
<?php $atopado = false; ?>
@foreach($produtos as $produto)
<div class="resultadobuscador py-2" onclick="link('album', {{$produto->id}})">
                <div class="artistaresultado"
                    style="width:47%;float:left;text-align:right;font-weight:550;margin-right:10px"
                >{{$produto->nome}}</div>
                <div
                    style="width:45%;float:left;text-align:left;margin-left:15px;"
                ><span style="font-size:13px;">ÁLBUM</span></div>
            </div>
            <?php $atopado = true; ?>
@endforeach

@foreach($artistas as $artista)
<div class="resultadobuscador" onclick="link('artista', {{$artista->id}})">
                <div class="artistaresultado"
                    style="width:47%;float:left;text-align:right;font-weight:550;margin-right:10px"
                >{{$artista->nome}}</div>
                <div
                    style="width:45%;float:left;text-align:left;margin-left:10px;font-weight:200"
                ><span style="font-size:13px">ARTISTA</span></div>
            </div>
            <?php $atopado = true; ?>
@endforeach

@if($atopado == false)
<div class="resultadobuscador py-2 text-center">
                Non hai resultados que mostrar
            </div>
@endif