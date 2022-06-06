@extends('layouts.master')
@section('title', 'configuración')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
        <div class="infolista" style="justify-content:start; height:100px">
            <h3>Configuración > <a class="blanco" href="/perfil/{{$perfil->id}}">&#64{{$perfil->login}}</a></h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <form action="/config/{{$perfil->id}}" method="post" enctype="multipart/form-data" style="width:100%;">
            @csrf
            <div style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
                <h5>Login</h5>
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
                <h5 class="mx-4">Descripción</h5>
                <textarea
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    rows="2"
                    width="100%"
                    cols="50"
                    name="descripcion"
                    onblur="validaDescripcion()"
                    id="descripcion"
                >{{$perfil->descripcion}}</textarea>
            </div>
            <div class="my-5" style="display:flex;align-items:center;justify-content:center;width:100%;flex-direction:row">
            <h5>Direccion</h5>
                <input 
                    class="mx-4"
                    type="text" 
                    style="background:none; border-radius:10px; border: 1px solid grey; color: white; outline: none; padding: 10px"
                    value="{{$perfil->direccion}}"
                    name="direccion"
                >
            </div>
            <div class="pb-4" style="display:flex;width:100%;justify-content:center">
                <button 
                    type="submit"
                    style="padding:10px 15px 10px 15px;background-color:black;color:white;border-radius:20px;border:1px solid grey"
                    name="enviar"
                    id="enviarboton"
                >Enviar</button>
            </div>
        </form>
    </div>

    <div id="erroTexto" class="errors text-center py-2"></div>
        @if(count($errors) > 0)
            <div class="errors text-center py-2">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<a href="/perfil/eliminar/{{$perfil->id}}" class="text-center"><h5 class="divconfig rojo">Eliminar tu cuenta en PLAYDISK</h5></a>
<br/>


<script>


const enviar = document.getElementById('enviarboton');
enviar.disabled = true;
function validaDescripcion() {
    valorTexto = document.getElementById('descripcion').value;
    regEx = /[a-zA-Z1-9]{10}/;
    if (!regEx.test(valorTexto)) {
        document.getElementById('erroTexto').innerHTML = "O texto debe ter, polo menos, 10 caracteres";
        return false;
    }
    enviar.disabled = false;
}

</script>

@stop
