<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CestaController;
use PDF;
class PedidoController extends Controller
{
    public function store() {
        $pedido = new Pedido; //creamos un novo pedido
        $pedido->data = date('Y-m-d'); //almacenamos a data
        $prezoTotal = 0; //inicializamos o contador do prezo total
        $pedido->perfil_id = Auth::user()->perfil->id;
        $pedido->prezo = $prezoTotal;
        $pedido->save();
        $lastIDpedido = Pedido::latest('id')->first()->id; //recollemos o último ID do pedido, o que acabamos de crear
        $cesta = Auth::user()->perfil->cesta; //asignamos a cesta do usuario actual a unha variable
        
        foreach($cesta->produtos as $produto) { //por cada un dos produtos da cesta
            foreach($produto->formatos as $formato) { //e cada un dos seus formatos
                $produto_id = $produto->id; //asignamos o produto a unha variable
                if($formato->id == $produto->pivot->formato_id) { //e se o formato mercado é igual ao formato do produto
                    $formato_id = $formato->id; //almacenamos o seu id nunha variable
                    $cantidade = intval($produto->pivot->cantidade); //e a súa cantidade noutro
                    $prezoTotal += $formato->pivot->prezo * $cantidade;
                          DB::insert('insert into pedido_produto (pedido_id, produto_id, cantidade, formato_id) values (?, ?, ?, ?)',
                            [
                                $lastIDpedido,
                                $produto_id,
                                $cantidade,
                                $formato_id
                            ]);  //facemos unha inserción de fila por cada un dos produtos asignados ao seu formato e cantidade   
                }
                    
            }
        }
        $pedido = Pedido::find($lastIDpedido);
        $pedido->prezo = $prezoTotal;
        $pedido->save();
        
        $pdf = PDF::loadview('facturapdf', ['cesta' => Auth::user()->perfil->cesta]);
        
        foreach($cesta->produtos as $produto) {
            $cesta->produtos()->detach($produto->id);
        }
        
        return $pdf->download('facturapedido' . $lastIDpedido . '.pdf');
               //redirect()->action([CestaController::class, 'index']);
    }
    
    public function show() {
        $pedidos = Auth::user()->perfil->pedidos;
        return view('pedidos', ['pedidos' => $pedidos]);
    }
    
    public function factura($id) {
        $pedido = Pedido::find($id);
        if($pedido->perfil_id == Auth::user()->perfil->id) {
            $pdf = PDF::loadview('facturapdf', ['cesta' => $pedido]);
            return $pdf->download('facturapedido' . $id . '.pdf');
        } else return abort(404);
    }
}
