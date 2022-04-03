@extends('layouts.master')
@section('title', 'catálogo')
@section('contido')
<div style="width:100%;background: linear-gradient(180deg, rgb(197, 202, 231) 0%, rgb(53, 52, 107) 70%, rgb(0, 0, 0) 100%);">

    <h2 class="titulocabeceiracatalogo text-center py-3">CATÁLOGO</h2>
<div class="corpocatalogo py-3">
    <div class="filtrocatalogo">
        <h3>Ordenar por: </h3>
        <select id="filtro" name="filtro" class="seleccionfiltro mx-3">
            <optgroup label="Engadidos">
                <option selected="selected" value="ultimos">Engadidos (último-primeiro)</option> 
            </optgroup>
            <optgroup label="Orde alfabética">
                <option value="alfabetica">Orde alfabética (A-Z)</option>
            </optgroup>
            <optgroup label="Data de saída">
                <option value="datasaida">Data de saída (último-primeiro)</option>
            </optgroup>
        </select>
    </div>
    <div class="divcorpocatalogo">
        <div id="albumescatalogo" class="albumescatalogo py-4" 
            style="display:flex; align-items:center">
            <?php $contador = 0; ?>
            @foreach($produtos as $produto)
                <div class="fichaalbum mx-3" style="height:200px" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum py-2" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha" style="font-size:15px;">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <a href="/artista/{{$artista->id}}" style="color:white;"><div class="artistaficha" style="font-size:13px;">{{$artista->nome}}</div></a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="etiquetascatalogo">
                <div class="tituloindextags mb-3" style="color:black"> 
                <i class="bi bi-tags"></i> XÉNEROS
                </div>
                @foreach($xeneros as $xenero)
                    <a  href="/catalogo/{{$xenero->id}}"><button class="xenero blanco my-1"><?php echo strtoupper($xenero->nome); ?></button></a>
                @endforeach
        </div>
    </div>
</div>
</div>
<script>
            $(document).ready(function() {
                $('#filtro').on('change',function () {
                    var buscar = $(this).val();
                    var data={"filtro":buscar};
                    $.ajax({
                        type: "GET",
                        url: "/filtrocatalogo",
                        data: data,
                        success: function (data) {
                            document.getElementById('albumescatalogo').innerHTML = data;
                        }
                    });
            });
        });
</script>

@stop