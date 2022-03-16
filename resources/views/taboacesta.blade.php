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