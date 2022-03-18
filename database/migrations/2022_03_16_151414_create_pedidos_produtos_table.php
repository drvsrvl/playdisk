<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->bigInteger('produto_id')->unsigned();
            $table->bigInteger('pedido_id')->unsigned();
            $table->bigInteger('formato_id')->unsigned();
            $table->foreign('produto_id')
                ->references('produto_id')
                ->on('formato_produto')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('formato_id')
                ->references('formato_id')
                ->on('formato_produto')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('cantidade');
            $table->primary(['pedido_id', 'produto_id', 'formato_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_produtos');
    }
}
