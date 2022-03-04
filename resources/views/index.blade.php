@extends('layouts.master')
@section('title', 'index')
@section('contido')
<div class="infoalbum" id="infoalbum">
    <div class="portada">
        <div class="titulo">
            <span class="tituloalbum">Vibras</span>
            <span class="artista">J Balvin</span>
        </div>
        <img src="/img/vibras.png" id="img" width="50%"></img>
        <span class="desc">Universal Music - 2018</span>
    </div>
    <div class="albumtexto">
            <h2 class="titulo">Tracklist</h2>
            <div class="tracklist">
                <div class="cancion" id="cancion1" onmouseover="play(1);" onmouseout="dontplay(1);">
                    <span class="play">
                        <h2 id="numCancion1" class="numCancion show">1</h2>
                        <h2 id="simPlay1" class="simPlay">▶︎</h2>
                    </span>
                    <span class="medio">
                        <span class="titulocancion">Mi Gente</span>
                        <a href=""><span class="autorcancion">J Balvin</span></a>
                    </span>
                    <div class="duracion">3:13</div>
                    <div class="menutrack">
                        <h1>+</h1>
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="informacionalbum">
    <div class="descripcion">
        <div class="my-3 mx-3">
            <h2>Descripción</h2>
            <div class="xeneros">
                <a href=""><button class="xenero">POP</button></a>
            </div>
            <div class="my-2 mr-4">
            En junio de 2017, Balvin junto con el productor y DJ francés Willy William lanzaron el sencillo «Mi Gente». La canción se convirtió en un gran éxito comercial alcanzando el número uno en más de treinta países en todo el mundo, incluido el número tres en la lista Billboard Hot 100 de los Estados Unidos. Según Balvin, desarrolló el concepto del álbum desde el momento en que «Mi Gente» comenzó a »conectar con audiencias de todo el mundo», con la intención de fusionar ritmos mundiales diferentes y refinar la música de reguetón.6​

En una entrevista con Ebro Darden para Beats 1 Radio en Apple Music en abril de 2018, Balvin describió el sonido del disco como 33 por ciento de dancehall, 33 por ciento de R&B y 33 por ciento de reguetón. Además explicó que puso mucho amor en la realización del álbum y que contiene diferentes vibraciones, de ahí el nombre, Vibras.7​

«
            </div>
        </div>
    </div>
    <div class="mercar">
        <div class="my-3">
            <h2>Mercar</h2>
            <table class="prezo">
                <tr>
                    <td>Vibras</td>
                    <td>Vinilo</td>
                    <td>30€</td>
                </tr>
                <tr>
                    <td>Vibras</td>
                    <td>CD</td>
                    <td>20€</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="comentarios">
    <form method="post">
        <textarea class="comentario" placeholder="Escrebe aquí o teu comentario..."></textarea>
        <button type="submit" class="enviar">Enviar</button>
    </form>
</div>
<script>
    $(window).ready(function(){
        var sourceImage = document.getElementById("img");
        var colorThief = new ColorThief();
        var color = colorThief.getColor(sourceImage);
        document.getElementById("infoalbum").style.backgroundColor = "rgb(" + color + ")";
        /*document.getElementById("menu").style.backgroundColor = "rgb(" + color + ")";*/

        
       });

      
</script>

@stop