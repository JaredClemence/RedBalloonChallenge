<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_registration', function (Blueprint $table) {
            /* @var $table Blueprint */
            $table->id();
            $table->timestamps();
            $table->integer('game_id');
            $table->bigInteger('user_id');
            $table->boolean('opted_in_emails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_registration');
    }
}
