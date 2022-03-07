
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
                <div class="dropdown">
                    <li>Vistas <i class="bi bi-caret-down-fill"></i></li>
                    <div class="dropdownmenu">
                        <a href="/artista">Artista</a>
                        <a href="/album">Álbum</a>
                        <a href="/perfil">Perfil</a>
                        <a href="/lista">Lista</a>
                </div>
            </ul>
        </div>
    </div>
    <div class="dereita">
        <div class="buscador">
            <input type="text" placeholder="Busca aquí">
        </div>
        @if(!Auth::user())
        <div class="login">
            <a href="/login"><button class="login">Login</button></a>
        </div>
        @else
        {{Auth::user()->perfil->login}}
        
        @endif
    </div>
    <!-- No caso de que estea iniciada a sesión faríamos algo co perfil
    ...
    -->

</div>