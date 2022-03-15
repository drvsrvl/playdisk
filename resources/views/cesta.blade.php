@extends('layouts.master')
@section('title', 'cesta')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:space-between; height:100px">
            <h3>Cesta</h3>
        </div>
    <hr/>

    <div class="cancionslista px-4" id="taboacesta">
      @if(!empty($cesta->produtos))
        <table>
            <tr>
                <td>Produto</td><!-- comment -->
                <td>Formato</td><!-- comment -->
                <td>Cantidade</td><!-- comment -->
                <td>Prezo individual</td><!-- comment -->
                <td>Prezo total</td>
            </tr>
            <?php $prezoTotal = 0; ?>
        @foreach($cesta->produtos as $produto)
            <tr>
                <td><img src="/img/caratula/{{$produto->caratula}}" width="50px"> {{$produto->nome}} - @foreach($produto->artistas as $artista) {{$artista->nome}} @endforeach</td>
                @foreach($produto->formatos as $formato) 
                    @if($formato->id == $produto->pivot->formato_id)
                        <td>{{$formato->nome}}</td>
                        <td><button onclick="modificar('restar', {{$produto->id}}, {{$formato->id}})">-</button>{{$produto->pivot->cantidade}}<button onclick="modificar('sumar', {{$produto->id}}, {{$formato->id}})">+</button></td>
                        <td>{{$formato->pivot->prezo}} €</td>
                        <td>{{$formato->pivot->prezo * $produto->pivot->cantidade}} €</td>
                        <?php $prezoTotal += $formato->pivot->prezo * $produto->pivot->cantidade; ?>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </table>
        
        <h5>Total sen IVE (21%): {{$prezoTotal}}€</h5>
        <h5>Total IVE: {{$prezoTotal* 0.21}}€</h5>
        <h5>Prezo total: {{$prezoTotal += $prezoTotal* 0.21}}€</h5>
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