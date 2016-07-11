<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablatorneo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('torneo|', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turnament_id')->unique();
            $table->string('name');
            $table->string('url')->unique();
            $table->text('description');
            $table->enum('tournament_type', ['single elimination','double elimination','round robin','swiss']);
            $table->enum("estatus",['capturado','en_proceso','finalizado']);
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
        Schema::drop('torneo');
    }
}
