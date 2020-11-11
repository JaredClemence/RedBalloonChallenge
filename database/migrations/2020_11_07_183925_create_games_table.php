<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            /* @var $table Blueprint */
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('shortname')->comment("This name is used for the referral URL.");
            $table->integer('total_prizes');
            $table->text('game_goal');
            $table->text('payout_terms');
            $table->text('prize_description');
            $table->text('motivation');
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
        Schema::dropIfExists('games');
    }
}
