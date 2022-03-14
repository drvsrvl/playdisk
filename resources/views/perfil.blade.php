@extends('layouts.master')
@section('title') &#64{{$perfil->login}} @stop
@section('contido')
<div style="width:100%; background: linear-gradient(180deg, rgb(17, 10, 92) 20%, rgb(0, 0, 0) 100%);">
<br/><br/>
    <div class="perfilinfo">
        <div style="width:100px;height:100px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
            border: 1.5px solid black;">
            <img class="perfilfoto" src="/img/perfil/{{$perfil->foto}}"></img>
        </div>
        <h3 class="perfilnome mx-3">&#64{{$perfil->login}}</h3>
    </div>
    <div class="informacionperfil">
        <div class="descripcionperfil">
            <div class="py-3 mx-3">
                <h2>Descripción</h2>
                <div class="py-2 mr-4">
                    {{$perfil->descripcion}}
                </div>
            </div>
        </div>
        <div class="listasperfil py-4 pb-6">
            <div class="py-3 mx-3" style="display:flex;align-items:center;justify-content:space-between">
                <h2>Listas</h2>
                @if(Auth::user()->perfil->id == $perfil->id)
                <div class="divconfig verde mr-4" onclick="window.location.href='/listanova'">
                    <h5><i class="bi bi-plus-square-fill"></i> Nova lista</h5>
                </div>
                @endif
            </div>
            @foreach($perfil->listas as $lista)
                <div class="divlistas my-4" onclick="link('lista',{{$lista->id}})">
                    <div class="playlistperfil">
                        <div class="esquerdaplaylist">
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
                </div>
            @endforeach
        </div>
    </div>
@stop