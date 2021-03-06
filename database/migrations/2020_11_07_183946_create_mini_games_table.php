<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_games', function (Blueprint $table) {
            /* @var $table Blueprint */
            $table->id();
            $table->timestamps();
            $table->bigInteger('game_id');
            $table->string('name');
            $table->text('description');
            $table->text('win_condition');
            $table->text('prize_description');
            $table->text('designed_goal');
            $table->dateTime('begin')->nullable();
            $table->dateTime('end')->nullable();
            $table->integer('min_duration_hours')->default(-1);
            $table->integer('max_duration_hours')->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mini_games');
    }
}
