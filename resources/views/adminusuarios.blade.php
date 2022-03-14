@extends('layouts.master')
@section('title', 'configuración')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
        <div class="infolista" style="justify-content:space-between; height:100px">
            <h3><a class="blanco" href="/admin"><i class="bi bi-arrow-left"></i>Volver</a></h3>
            <h3>Administración de perfiles </h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <div class="my-3" style="width:100%;display:flex;justify-content:final;">
        </div>
        <div class="albumescatalogo py-4" 
            style="display:flex; align-items:center">
        @foreach($perfils as $perfil)
            <div class="fichaalbum mx-2" style="width:200px" onclick="link('admin/perfil',{{$perfil->id}})">
                <div style="width:60px;height:60px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
                ">
                    <img class="fichaalbum" width="100%" src="/img/perfil/{{$perfil->foto}}"></img>
                </div>
                    <div class="tituloficha">{{$perfil->login}}</div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<br/>

@stop