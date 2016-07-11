<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarForeingParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('torneo_participante', function ($table) {
            $table->foreign("torneo_id")->references("id")->on("torneo")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

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
    }
}
