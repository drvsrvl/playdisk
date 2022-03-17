<div class="divreproductormp3 open" id="divreproductor" style="display:flex;justify-content:center;align-items:center">

    
        <img class="mx-3"height="45px" src="/img/caratula/{{$cancion->produto->caratula}}">
        <div style="display:flex;justify-content:center;">
            <div class="mx-3" style="display:flex;flex-direction:column;justify-content:center">
                <marquee SCROLLDELAY =300 width="120px;">
                    {{$cancion->nome}}
                </marquee>
                <div >
                    {{$cancion->produto->nome}}
                </div>
            </div>
        </div>
            <div class="mx-2">
                @foreach($cancion->artistas as $artista)
                    {{$artista->nome}}
                @endforeach
            </div>
        <audio id="reproduccion{{$cancion->id}}" class="cancionreproductormp3 mx-3" src="/cancions/{{$cancion->arquivo}}" controls autoplay></audio>
        <div class="closereproductor" style="height:35px;"  onclick="closereproductor({{$cancion->id}});">
            <h2><i class="bi bi-x py-3"></i></h2>
        </div>
</div>
