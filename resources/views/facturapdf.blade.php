
<html>
<head>
    <link rel="stylesheet" href="/css/estilo.css">
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>
<body>
  <header>
    <h1>Factura de Playdisk</h1>
  </header>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              PLAYDISK
            </p>
        </td>
        <td>
          <p class="page">
            Página 
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
     <h1>PLAYDISK</h1>
     
     <p>Perfil: {{Auth::user()->perfil->login}}</p><!-- comment -->
     <p>Data: <?php echo date('d-m-Y') ?></p>
     <p>Facura nº {{$cesta->id}}</p>
     <p>Dirección: {{Auth::user()->perfil->direccion}}</p>

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
                <td class="tablainfoproduto"><span style="margin-left:10px;">{{$produto->nome}} - @foreach($produto->artistas as $artista) {{$artista->nome}} @endforeach</span></td>
                @foreach($produto->formatos as $formato) 
                    @if($formato->id == $produto->pivot->formato_id)
                        <td>{{$formato->nome}}</td>
                        <td>{{$produto->pivot->cantidade}}</td>
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

    </div>
    
  </div>
</body>
</html>
