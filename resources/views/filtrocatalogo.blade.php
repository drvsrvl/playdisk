@foreach($produtos as $produto)
                <div class="fichaalbum mx-3" onclick="link('album',{{$produto->id}})">
                    <img class="fichaalbum" width="100%" src="/img/caratula/{{$produto->caratula}}"></img>
                    <div class="tituloficha" style="font-size:15px;">{{$produto->nome}}</div>
                    @foreach($produto->artistas as $artista)
                        <a href="/artista/{{$artista->id}}" style="color:white;"><div class="artistaficha" style="font-size:13px;">{{$artista->nome}}</div></a>
                    @endforeach
                </div>
@endforeach