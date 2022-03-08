<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->tinyText('comentario');
            $table->bigInteger('perfil_id')->unsigned();
            $table->bigInteger('produto_id')->unsigned();
            $table->date('data');
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('comentarios');
    }
}
