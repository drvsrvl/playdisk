@extends('layouts.master')
@section('title', 'cesta')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:center; height:80px">
            <h3>Pedidos de {{Auth::user()->perfil->login}}</h3>
        </div>
    <hr/>
    <?php
    $contadorCesta = 0;
        foreach($pedidos as $pedido) {
            $contadorCesta++;
        }
    ?>
    <div class="cancionslista px-4" id="taboacesta">
      @if($contadorCesta!=0)
        <table class="taboacesta">
            <tr class="cabeceira">
                <td>PEDIDO</td><!-- comment -->
                <td>DATA</td><!-- comment -->
                <td>PREZO TOTAL</td><!-- comment -->
                <td>FACTURA</td><!-- comment -->
            </tr>
            <?php $prezoTotal = 0; ?>
        @foreach($pedidos as $pedido)
            <tr class="produtos">
                <td class="tablainfoproduto">Pedido nº{{$pedido->id}}</td>
                <td>{{$pedido->created_at}}</td>
                <td>{{$pedido->prezo + ($pedido->prezo * 0.21)}} €</td>
                <td><a href="/factura/{{$pedido->id}}"><button class="login">Descargar</button></a></td>
            </tr>
        @endforeach
        </table>
        @else 
        <h5 class="text-center">Non hai produtos que mostrar, diríxete ao noso <a href="/catalogo" class="blanco">catálogo</a> para explorar os distintos álbumes.</h5>
    @endif
    </div>
    
</div>
<br/>


@stop
