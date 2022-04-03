<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_cancion', function (Blueprint $table) {
            $table->bigInteger('artista_id')->unsigned();
            $table->bigInteger('cancion_id')->unsigned();
            $table->foreign('artista_id')
                ->references('id')
                ->on('artistas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('cancion_id')
                ->references('id')
                ->on('cancions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['artista_id', 'cancion_id']);
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
        Schema::dropIfExists('artista_cancion');
    }
}
