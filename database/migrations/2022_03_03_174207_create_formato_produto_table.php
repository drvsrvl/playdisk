<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formato_produto', function (Blueprint $table) {
            $table->bigInteger('formato_id')->unsigned();
            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('formato_id')
                ->references('id')
                ->on('formatos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['formato_id', 'produto_id']);
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
        Schema::dropIfExists('formato_produto');
    }
}
