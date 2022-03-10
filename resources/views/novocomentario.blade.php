            <div style="display:flex;align-items:center;width:100%;" class="py-2" 
                @if(Auth::user()->perfil->id == $comentario->perfil->id)
                onmouseover="eliminarcomentario({{$comentario->id}})" onmouseout="outeliminarcomentario({{$comentario->id}})"
                @endif
            > 
                <div style="width:50px;height:50px;overflow:hidden;display:inline-block;position:relative;border-radius:50%;
                    " onclick="link('perfil',{{$comentario->perfil->id}});">
                    <img class="perfilfoto link" src="/img/perfil/{{$comentario->perfil->foto}}"></img>
                </div>
                <div class="px-3" style="display:flex;flex-direction:column;align-items:start;width:100%;">
                    <div style="display:flex;align-items:center; justify-content:space-between; width:100%">
                        <div>
                            <a style="font-weight:600" href="/perfil/{{$comentario->perfil->id}}">&#64{{$comentario->perfil->login}}</a> ・ <span style="color:grey">{{$comentario->data}}</span>
                        </div>  
                        <div>
                            <a id="eliminarcomentario{{$comentario->id}}" class="divconfig rojo notshow" style="font-size:12px" href="/comentario/eliminar/{{$comentario->id}}">Eliminar comentario</a>
                        </div>
                    </div> 
                    <div style="">
                        {{$comentario->comentario}}
                    </div>
                </div>
            </div>