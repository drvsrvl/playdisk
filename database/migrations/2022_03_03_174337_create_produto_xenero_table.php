<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoXeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_xenero', function (Blueprint $table) {
            $table->bigInteger('produto_id')->unsigned();
            $table->bigInteger('xenero_id')->unsigned();
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                       $table->foreign('xenero_id')
                ->references('id')
                ->on('xeneros')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['xenero_id', 'produto_id']);
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
        Schema::dropIfExists('produto_xenero');
    }
}
