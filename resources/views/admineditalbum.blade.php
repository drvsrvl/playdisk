@extends('layouts.master')
@section('title', 'configuración')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:space-between; height:100px">
            <h3><a class="blanco" href="/admin/albumes"><i class="bi bi-arrow-left"></i>Volver</a></h3>
            <h3>Configuración > <a class="blanco" href="/album/{{$produto->id}}">{{$produto->nome}}</a></h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <form action="/admin/album/{{$produto->id}}" method="post" enctype="multipart/form-data" style="width:100%;">
            @csrf
            <div style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5>Nome</h5>
                <input 
                    class="mx-4"
                    type="text" 
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    value="{{$produto->nome}}"
                    name="nome"
                >
                <h5 class="mx-2">Foto</h5>
                <input 
                    type="file"
                    class="mx-4"
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    name="caratula"
                >
            </div> 
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5 class="mx-4">Descripción</h5>
                <textarea
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    rows="7"
                    width="100%"
                    cols="50"
                    name="descripcion"
                >{{$produto->descripcion}}</textarea>
            </div>
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row;align-items:center">
                <h5 class="mx-4">Artista: </h5>
                    <select name="artista"
                        style="background:none;border: 1px solid grey; color: white; outline: none;">
                            <option disabled="disabled">Escolle o artista do álbum</option>
                        @foreach($artistas as $artista)
                            <option value="{{$artista->id}}" 
                                @foreach($produto->artistas as $artistaprod)
                                    @if($artistaprod->id == $artista->id) 
                                        selected="selected" 
                                    @endif
                                @endforeach
                            >{{$artista->nome}}</option>
                        @endforeach
                    </select>
                <h5 class="mx-4">Data de lanzamento: </h5>
                    <input type="date" name="dataLanzamento" value="{{$produto->data_lanzamento}}"
                    style="background:none;border: 1px solid grey; color: white; outline: none;">
            </div>
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row;align-items:center"><!-- comment -->
                @foreach($xeneros as $xenero)
                    <input type="checkbox" name="xeneros[]" value="{{$xenero->id}}" 
                           @foreach($produto->xeneros as $xeneroProd) 
                                @if($xeneroProd->id == $xenero->id) checked @endif
                           @endforeach
                           >{{$xenero->nome}}
                @endforeach
            </div>
            <div class="pb-4" style="display:flex;width:100%;justify-content:center;">
                <button 
                    type="submit"
                    style="padding:10px 15px 10px 15px;background-color:black;color:white;border-radius:20px;border:1px solid grey"
                    name="enviar"
                >Enviar</button>
            </div>
        </form>
    </div>
    <hr/>
    <div class="cancionslista px-4">
        <h3 class="py-2">Nova canción</h3>
        <form action="/admin/cancion" method="post" enctype="multipart/form-data" style="width:100%;">
            @csrf
            <div style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5>Nome</h5>
                <input 
                    class="mx-4"
                    type="text" 
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    name="nome"
                >
                <h5 class="mx-2">Arquivo de audio</h5>
                <input 
                    type="file"
                    class="mx-4"
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    name="arquivo"
                >
            </div>
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row;align-items:center">
                <input type="hidden" name="produtoid" value="{{$produto->id}}">
                <h5 class="mx-4">Posición en álbum: </h5>
                    <input type="number" name="posicion"
                        style="background:none;border: 1px solid grey; color: white; outline: none;">
                <h5 class="mx-4">Duración da canción: </h5>
                    <input type="time" name="duracion"
                        style="background:none;border: 1px solid grey; color: white; outline: none;">
            </div>
            
            <div class="pb-4" style="display:flex;width:100%;justify-content:center;">
                <button 
                    type="submit"
                    style="padding:10px 15px 10px 15px;background-color:black;color:white;border-radius:20px;border:1px solid grey"
                    name="enviar"
                >Enviar</button>
            </div>
        </form>
    </div>
</div>
<a href="/produto/eliminar/{{$produto->id}}" class="text-center"><h5 class="divconfig rojo">Eliminar {{$produto->nome}} de PLAYDISK</h5></a>
<br/>

@stop