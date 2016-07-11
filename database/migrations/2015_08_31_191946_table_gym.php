<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableGym extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        //
        Schema::create("gym",function(Blueprint $table){
            $table->increments("id");
            $table->integer("tipo_id")->unsigned();
            $table->foreign("tipo_id")->references("id")->on("tipo")->onDelete("cascade");
            $table->dateTime('last_open')->nullable();
            $table->enum('estatus', array('abierto', 'cerrado'));
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
        //
        Schema::drop("gym");
    }
}
