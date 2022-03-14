<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Perfil;
use App\Models\Xenero;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderby('data','desc')->get();
        $xeneros = Xenero::all();
        return view('catalogo', ['produtos' => $produtos, 'xeneros' => $xeneros]);
    }

    public function buscadorindex(Request $request) {
        if ($request->ajax()) {
            $artistas = Artista::where('nome','LIKE',$request->nome.'%')->get(); 
            $produtos = Produto::where('nome','LIKE',$request->nome.'%')->get();
            if(empty($request->nome)) {
                $artistas = 'No';
                $produtos = [];
            }
            return view('buscadorindex', ['artistas' => $artistas, 'produtos' => $produtos]);
        }
    }

    public function buscadormenu(Request $request) {
        if ($request->ajax()) {
            $artistas = Artista::where('nome','LIKE',$request->nome.'%')->get(); 
            $produtos = Produto::where('nome','LIKE',$request->nome.'%')->get();
            $perfis = Perfil::where('login','LIKE',$request->nome.'%')->get();
            if(empty($request->nome)) {
                $artistas = [];
                $produtos = 'No';
                $perfis = [];
            }
            return view('buscadormenu', ['artistas' => $artistas, 'produtos' => $produtos, 'perfis' => $perfis]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistas = Artista::all(); 
        return view('adminnovoalbum', ['artistas' => $artistas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ //validamos os campos
            'nome' => 'required|string',
            'descripcion' => 'required|string',
            'artista' => 'required',
            'dataLanzamento' => 'required'
        ]);
        if($validated) { //no caso de ser válidos
            if($request->hasfile('caratula')){
                $foto = $request->file('caratula');
                $nome = "produto" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/caratula'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            } else $nomefoto = 'default.png';
            DB::insert('insert into produtos (nome, caratula, descripcion, data_lanzamento, data) values (?, ?, ?, ?, ?)',
                [
                    $request->nome,
                    $nomefoto,
                    $request->descripcion,
                    $request->dataLanzamento,
                    date("Y-m-d")
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
                $lastID = Produto::latest('id')->first()->id; //Buscamos o último id de lista (a que acabamos de crear) para ensinalo
                DB::insert('insert into artista_produto (artista_id, produto_id) values (?, ?)',
                    [
                        intval($request->artista),
                        $lastID
                    ]);
            return redirect()->action([ProdutoController::class, 'admin']); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        $perfil = Auth::user()->perfil;
        return view('album', ['produto' => $produto, 'perfil' => $perfil]);
    }
    
    public function inicio() {
        $ultimosProdutos = Produto::orderby('data','desc')->get();
        $xeneros = Xenero::all();

        $reproduccions = [];
        $produtos = Produto::all();
        foreach ($produtos as $produto) {
            $contadorReproduccions = 0;
            foreach ($produto->cancions as $cancion) {
                $contadorReproduccions += intval($cancion->reproduccions);
            }
            $reproduccions[$produto->id] = $contadorReproduccions;
        }
        arsort($reproduccions);
        $trending = [];
        $cont=0;
        foreach ($reproduccions as $produtoid => $contador) {
            $trending[$cont] = Produto::find($produtoid);
            $cont++;
            if($cont == 6) {
                break;
            }
        }
        return view('index', ['ultimosProdutos' => $ultimosProdutos, 'xeneros' => $xeneros, 'trending' => $trending]);
    }

    public function admin() {
        $produtos = Produto::all();
        return view('adminalbumes', ['produtos' => $produtos]);
    }

    public function filtrocatalogo(Request $request) {
        if($request->ajax()) {
            $ultimosProdutos = Produto::orderby('data','desc')->get();
            $alfabetico = Produto::orderby('nome','asc')->get();
            $ordesaida = Produto::orderby('data_lanzamento','desc')->get();
            if($request->filtro == 'ultimos') {
                return view('filtrocatalogo', ['produtos' => $ultimosProdutos]);
            } else if ($request->filtro == 'alfabetica') {
                return view('filtrocatalogo', ['produtos' => $alfabetico]);
            } else if ($request->filtro == 'datasaida') {
                return view('filtrocatalogo', ['produtos' => $ordesaida]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $artistas = Artista::all(); 
        return view('admineditalbum', ['produto' => $produto, 'artistas' => $artistas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ //validamos os campos
            'nome' => 'required|string',
            'descripcion' => 'required|string',
            'artista' => 'required'
        ]);
        if($validated) { //no caso de ser válidos
            $produto = Produto::find($id); //buscamos o nodo con esa id
            $nomefoto = $produto->caratula; //recuperamos o valor do nome da imaxe
            if($request->hasfile('caratula')){
                $foto = $request->file('caratula');
                $nome = "produto" . $id;
                $extension = $foto->guessExtension();
                $nomefoto = "$nome.$extension"; //poñémoslle de nome o timestamp coa extensión
                $foto->move(public_path('img/caratula'),$nomefoto); //e movémola á carpeta de imaxes da entrada
            }
            DB::update('update produtos set nome=?, caratula=?, descripcion=?, data_lanzamento=?, data=? where id="' . $id . '"',
                [
                    $request->nome,
                    $nomefoto,
                    $request->descripcion,
                    $request->dataLanzamento,
                    date("Y-m-d")
                ]);  //facemos a consulta preparada e pasámoslle os parámetros indicados
            $repetido=false;
            foreach($produto->artistas as $artista) {
                if($artista->id == $request->artista) {
                    $repetido=true;
                }
            }
            if(!$repetido) {
                DB::insert('insert into artista_produto (artista_id, produto_id) values (?, ?)',
                    [
                        intval($request->artista),
                        $id
                    ]);
            }
            return redirect()->action([ProdutoController::class, 'admin']); //rediriximos á vista detallada do nodo co id indicado
        }
        else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
