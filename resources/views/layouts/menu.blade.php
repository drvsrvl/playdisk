
<div class="menu" id="menu">
    <div class="esquerda">
        <div class="identidade">
            <a href="/"><span class="logo">
                <img src=""></img> 
            </span>
            <h1>PLAYDISK</h1></a>
        </div>
        <div class="seccions">
            <ul>
                <a href="/catalogo"><li>Catálogo</li></a>
            </ul>
        </div>
    </div>
    <div class="dereita mx-2" style="display:flex; align-items:center;">
        <div class="buscador mt-1" style="">
            <input type="text" placeholder="Busca aquí" id="inputbuscadormenu">
            <div class="contedormenuresultados" id="contedormenuresultados">
                
            </div>
        </div>
        @if(!Auth::user())
        <div class="login">
            <a href="/login"><button class="login">Login</button></a>
        </div>
        @else
        <?php
            $cesta = Auth::user()->perfil->cesta;
            $contador = 0;
            if(!empty($cesta->produtos)) {
                foreach ($cesta->produtos as $produto) {
                    $contador += intval($produto->pivot->cantidade);
                }
            }
        ?>
        <div class="cestamenu mx-2"
            style="margin-top:3px; width:37px;height:37px;border:1px solid black;padding: 0 6px 0 6px;border-radius:50%;position:relative"
            onclick="window.location.href = '/cesta';">
            <h5 style="padding-top:5px;padding-left:1px"><i class="bi bi-cart-fill"></i></h5>
            @if($contador != 0)
                <div class="notificacionmenu" 
                    style="width:13px;height:13px;background-color:white;color:black;border:1px solid black;border-radius:50%;position:absolute;right:0;top:0;display:flex;justify-content:center;align-items:center">
                    <span style="font-size:9px" id="notificacionmenu">{{$contador}}</span>
                </div>
            @endif
        </div>
            <div class="dropdown mx-4">
                <div class="nomeperfildropdown mt-1 pr-1" 
                    style="display:flex; align-items:center;border:1px solid black;border-radius:40px;background-color:black;color:white;min-width:130px;">
                    <div class="" style="width:35px;height:35px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;border: 1px solid black;
                        ">
                        <img class="perfilfoto" src="/img/perfil/{{Auth::user()->perfil->foto}}"></img>
                    </div><span class="mx-3" style="font-weight:500">{{Auth::user()->perfil->login}}</span> <i class="bi bi-caret-down-fill mx-1"></i>
                </div>
                <div class="dropdownmenu">
                    <a href="/perfil/{{Auth::user()->perfil->id}}">Perfil</a>
                    <a href="/pedidos">Pedidos</a>
                    <a href="/config/{{Auth::user()->perfil->id}}">Configuración</a>
                    @if(Auth::user()->perfil->rol == "admin")
                    <a href="/admin">Administrador</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Saír
                        </a>
                    </form>
                </div>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function() {
            $('#inputbuscadormenu').on('keyup',function () {
                var buscar = $(this).val();
                var data={'nome':buscar};
                $.ajax({
                    type: "get",
                    url: "/buscadormenu",
                    data: data,
                    success: function (data) {
                        document.getElementById('contedormenuresultados').innerHTML = data;
                    }
                });
                if($(this).val() === "") document.getElementById('contedormenuresultados').innerHTML = "";
            });
        });
</script>

</div>