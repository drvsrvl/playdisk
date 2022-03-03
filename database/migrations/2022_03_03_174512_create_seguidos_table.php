<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidos', function (Blueprint $table) {
            $table->bigInteger('perfil_id')->unsigned();
            $table->bigInteger('seguido_id')->unsigned();
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('seguido_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('data');
            $table->primary(['perfil_id', 'seguido_id']);
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
        Schema::dropIfExists('seguidos');
    }
}
