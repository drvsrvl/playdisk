<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion_lista', function (Blueprint $table) {
            $table->bigInteger('cancion_id')->unsigned();
            $table->bigInteger('lista_id')->unsigned();
            $table->foreign('cancion_id')
                ->references('id')
                ->on('cancions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('lista_id')
                ->references('id')
                ->on('listas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('data');
            $table->bigInteger('posicion');
            $table->primary(['cancion_id', 'lista_id']);
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
        Schema::dropIfExists('cancion_lista');
    }
}
