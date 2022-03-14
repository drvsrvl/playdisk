<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCestaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cesta_produto', function (Blueprint $table) {
            $table->bigInteger('produto_id')->unsigned();
            $table->bigInteger('cesta_id')->unsigned();
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('cesta')
                ->references('id')
                ->on('cestas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('cantidade');
            $table->primary(['cesta_id', 'produto_id']);
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
        Schema::dropIfExists('cesta_produto');
    }
}
