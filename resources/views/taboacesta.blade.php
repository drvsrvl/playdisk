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