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
            $table->bigInteger('referred_by')->nullable();
            $table->boolean('opted_in_emails')->default(true);
            $table->text('affiliate_name')->nullable();
            $table->integer('node_value')->default(0);
            $table->integer('tree_depth')->default(0);
            $table->unique(['game_id','user_id']);
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
