
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
    <div class="dereita mx-4" style="display:flex; align-items:center;">
        <div class="buscador mt-1">
            <input type="text" placeholder="Busca aquí">
        </div>
        @if(!Auth::user())
        <div class="login">
            <a href="/login"><button class="login">Login</button></a>
        </div>
        @else

            <div class="dropdown mx-2">
                <div class="nomeperfildropdown mt-1 pr-1" 
                    style="display:flex; align-items:center;border:1px solid black;border-radius:40px;background-color:black;color:white">
                    <div class="" style="width:35px;height:35px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;border: 1px solid black;
                        ">
                        <img class="perfilfoto" src="/img/perfil/{{Auth::user()->perfil->foto}}"></img>
                    </div><span class="mx-2" style="font-weight:500">{{Auth::user()->perfil->login}}</span> <i class="bi bi-caret-down-fill mx-1"></i>
                </div>
                <div class="dropdownmenu">
                    <a href="/perfil/{{Auth::user()->perfil->id}}">Perfil</a>
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
    <!-- No caso de que estea iniciada a sesión faríamos algo co perfil
    ...
    -->

</div>