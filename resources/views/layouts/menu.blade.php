
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
    <div class="dereita mx-4">
        <div class="buscador">
            <input type="text" placeholder="Busca aquí">
        </div>
        @if(!Auth::user())
        <div class="login">
            <a href="/login"><button class="login">Login</button></a>
        </div>
        @else

            <div class="dropdown mx-2">
                <div class="nomeperfildropdown mt-1 pr-1" style="display:flex;">
                {{Auth::user()->perfil->login}} <i class="bi bi-caret-down-fill mx-1"></i>
                </div>
                <div class="dropdownmenu">
                    <a href="/perfil/{{Auth::user()->perfil->id}}">Perfil</a>
                    <a href="/config/{{Auth::user()->perfil->id}}">Configuración</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
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