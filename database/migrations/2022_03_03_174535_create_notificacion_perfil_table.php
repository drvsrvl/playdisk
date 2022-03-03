<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacion_perfil', function (Blueprint $table) {
           $table->bigInteger('notificacion_id')->unsigned();
            $table->bigInteger('perfil_id')->unsigned();
             $table->foreign('notificacion_id')
                ->references('id')
                ->on('notificacions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          
            $table->date('data');
            $table->primary(['perfil_id', 'notificacion_id']);
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
        Schema::dropIfExists('notificacion_perfil');
    }
}
