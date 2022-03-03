<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_produto', function (Blueprint $table) {
            $table->bigInteger('artista_id')->unsigned();
            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('artista_id')
                ->references('id')
                ->on('artistas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['artista_id', 'produto_id']);
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
        Schema::dropIfExists('artista_produto');
    }
}
