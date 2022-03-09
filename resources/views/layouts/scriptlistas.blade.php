<?php
    if (isset($_GET['cancion'])) {
        $cancionid=$_GET['cancion'];
    } else $cancionid='2';
?>
<div class="scriptlistas" id="scriptlistas">
    <div class="scriptinfolista">
        <h4 class="pt-4">Engadir a:</h4>
    </div>
    <hr/>
    <div class="scriptlistasperfil">
        <div class="divlistas my-4" >
            @foreach($perfil->listas as $lista)
                    <div class="playlistperfil my-2" onclick="vincularlista({{$cancionid}},{{$lista->id}})">
                        <div class="scriptesquerdaplaylist">
                            <div style="width:60px;height:60px;overflow:hidden;display:inline-block;position:relative;border-radius:5%;">
                                <img class="imaxeplaylist" height="100%" src="/img/lista/{{$lista->foto}}"></img>
                            </div>
                            <div class="tituloplaylistperfil">{{$lista->titulo}}</div>
                        </div>
                        <div class="dereitaplaylist">
                            <a href="/perfil/{{$perfil->id}}" style="color:white"><div class="perfilplaylist">&#64{{$perfil->login}}</div></a>
                            <div class="numcancionsplaylist">
                                <?php $numCancions = count($lista->cancions);
                                    if($numCancions !== 1) {
                                        echo $numCancions . ' cancións';
                                    } else echo $numCancions . ' canción';
                                ?>
                            </div>
                        </div>
                    </div>
            
            @endforeach
        </div>
    </div>
</div>