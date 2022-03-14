<?php $atopado = false; ?>
<div class="divmenubuscador mx-1">
@foreach($produtos as $produto)

        <div class="resultadomenubuscador py-1" onclick="link('album',{{$produto->id}})">
            <span class="spanresultadomenu" style="font-weight:600;">{{$produto->nome}}</span>  <span style="font-size:9px;color:grey">PRODUTO</span>
        </div>

    <?php $atopado = true; ?>
@endforeach

@foreach($artistas as $artista)

        <div class="resultadomenubuscador py-1" onclick="link('artista',{{$artista->id}})">
            <span class="spanresultadomenu" style="font-weight:600;">{{$artista->nome}}</span>  <span style="font-size:9px;color:grey">ARTISTA</span>
        </div>

    <?php $atopado = true; ?>
@endforeach

@foreach($perfis as $perfil)

        <div class="resultadomenubuscador py-1" onclick="link('perfil',{{$perfil->id}})">
            <span class="spanresultadomenu" style="font-weight:600;">&#64{{$perfil->login}}</span>  <span style="font-size:9px;color:grey">PERFIL</span>
        </div>

    <?php $atopado = true; ?>
@endforeach
</div>
@if($atopado==false) 
    <div class="divmenubuscador mx-1">
        <div class="py-1 text-center">
            <span style="font-weight:500; font-size:13px">Non se atoparon resultados que mostrar</span> 
        </div>
    </div>
@endif
