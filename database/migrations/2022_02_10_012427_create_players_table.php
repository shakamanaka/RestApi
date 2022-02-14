<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->string('name', 40);
            $table->string('position', 5);
            $table->string('positionFull', 30);
            $table->integer('rating');
            $table->integer('id_api');
            $table->integer('stat_pac');
            $table->integer('stat_sho');
            $table->integer('stat_pas');
            $table->integer('stat_dri');
            $table->integer('stat_def');
            $table->integer('stat_phy');
            $table->string('nation', 30);
            $table->string('club', 30);
            // $table->integer('player_identifier')->unique();
            


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
        Schema::dropIfExists('players');
    }
}
