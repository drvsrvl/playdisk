@extends('layouts.master')
@section('title', 'cesta')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:center; height:80px">
            <h3>Cesta</h3>
        </div>


    <div class="cancionslista px-4" id="taboacesta">
      @if(!empty($cesta->produtos))
        <table class="taboacesta">
            <tr class="cabeceira">
                <td>PRODUTO</td><!-- comment -->
                <td>FORMATO</td><!-- comment -->
                <td>CANTIDADE</td><!-- comment -->
                <td>PREZO INDIVIDUAL</td><!-- comment -->
                <td>PREZO TOTAL</td>
            </tr>
            <?php $prezoTotal = 0; ?>
        @foreach($cesta->produtos as $produto)
            <tr class="produtos">
                <td class="tablainfoproduto"><img src="/img/caratula/{{$produto->caratula}}" width="50px"> <span style="margin-left:10px;"><a class="blanco" href="/album/{{$produto->id}}">{{$produto->nome}}</a> - @foreach($produto->artistas as $artista) <a class="blanco" href="/artista/{{$artista->id}}">{{$artista->nome}}</a> @endforeach</span></td>
                @foreach($produto->formatos as $formato) 
                    @if($formato->id == $produto->pivot->formato_id)
                        <td>{{$formato->nome}}</td>
                        <td><button class="modificarcesta" onclick="modificar('restar', {{$produto->id}}, {{$formato->id}})">-</button>{{$produto->pivot->cantidade}}<button class="modificarcesta" onclick="modificar('sumar', {{$produto->id}}, {{$formato->id}})">+</button></td>
                        <td>{{$formato->pivot->prezo}} €</td>
                        <td>{{$formato->pivot->prezo * $produto->pivot->cantidade}} €</td>
                        <?php $prezoTotal += $formato->pivot->prezo * $produto->pivot->cantidade; ?>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </table>
        <div class="informacioncesta">
            <h5>Total sen IVE (21%): {{$prezoTotal}}€</h5>
            <h5>Total IVE: {{$prezoTotal* 0.21}}€</h5>
            <h5>Prezo total: {{$prezoTotal += $prezoTotal* 0.21}}€</h5>
        </div>
        <div class="text-center my-3">
            <button class="login" style="border:1px solid grey; font-size:16px">Efectuar pedido</button>
        </div>
        @else 
        <h5 class="text-center">Non hai produtos que mostrar, diríxete ao noso <a href="/catalogo" class="blanco">catálogo</a> para explorar os distintos álbumes.</h5>
    @endif
    </div>
    
</div>
<br/>

<script>
   function modificar(tipo, produtoid, formatoid) {
        var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
        var data={produto_id:produtoid, formato_id:formatoid, _token:token};
        if(tipo == 'sumar') {
            $.ajax({
                type: "post",
                url: "/cesta/engadir",
                data: data,
                success: function (data) {
                     var notificacion = document.getElementById('notificacionmenu');
                    notificacion.innerHTML = parseInt(notificacion.innerHTML) + 1;
                    $("#taboacesta").html(data);

                }
            });
        } else if (tipo == 'restar') {
            $.ajax({
                type: "post",
                url: "/cesta/quitar",
                data: data,
                success: function (data) {
                     var notificacion = document.getElementById('notificacionmenu');
                    notificacion.innerHTML = parseInt(notificacion.innerHTML) - 1;
                    $("#taboacesta").html(data);
                }
            });
        }
    }; 
</script>

@stop