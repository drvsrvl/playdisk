<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->bigInteger('perfil_id')->unsigned();
            $table->bigInteger('seguidor_id')->unsigned();
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('seguidor_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('data');
            $table->primary(['perfil_id', 'seguidor_id']);
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
        Schema::dropIfExists('seguidores');
    }
}
