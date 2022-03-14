@extends('layouts.master')
@section('title', 'configuración')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:space-between; height:100px">
            <h3><a class="blanco" href="/admin/perfils"><i class="bi bi-arrow-left"></i>Volver</a></h3>
            <h3>Configuración > <a class="blanco" href="/perfil/{{$perfil->id}}">{{$perfil->login}}</a></h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <form action="/admin/perfil/{{$perfil->id}}" method="post" enctype="multipart/form-data" style="width:100%;">
            @csrf
            <div style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5>Nome</h5>
                <input 
                    class="mx-4"
                    type="text" 
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    value="{{$perfil->login}}"
                    name="login"
                >
                <h5 class="mx-2">Foto</h5>
                <input 
                    type="file"
                    class="mx-4"
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    name="foto"
                >
            </div> 
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5 class="mx-4">Descrición</h5>
                <textarea
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    rows="7"
                    width="100%"
                    cols="50"
                    name="descripcion"
                >{{$perfil->descripcion}}</textarea>
                <h5 class="mx-4">Rol</h5>
                <select name="rol"
                      style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"  >
                    <option value="admin" @if($perfil->rol == 'admin') selected="selected" @endif>Admin</option><!-- comment -->
                    <option value="user" @if($perfil->rol == 'user') selected="selected" @endif>User</option>
                </select>
            </div>
            <div class="pb-4" style="display:flex;width:100%;justify-content:center">
                <button 
                    type="submit"
                    style="padding:10px 15px 10px 15px;background-color:black;color:white;border-radius:20px;border:1px solid grey"
                    name="enviar"
                >Enviar</button>
            </div>
        </form>
    </div>
    
</div>
<a href="/perfil/eliminar/{{$perfil->id}}" class="text-center"><h5 class="divconfig rojo">Eliminar a {{$perfil->login}} de PLAYDISK</h5></a>
<br/>

@stop