<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->integer("rol_id")->unsigned();
            $table->foreign("rol_id")->references("id")->on("acl_rol")->onDelete("cascade");
            $table->string('usuario')->unique();
            $table->string('nombre');
            $table->string('imagen');
        }); 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
