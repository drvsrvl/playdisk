<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancions', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('artistas');
            $table->string('duracion');
            $table->bigInteger('produto_id')->unsigned();
            $table->integer('numero_produto');
            $table->string('arquivo');
            $table->bigInteger('reproduccions');
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('cancions');
    }
}
