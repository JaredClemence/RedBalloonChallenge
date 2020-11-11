<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Game;

class GameRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $game = Game::first();
        if( $user != null && $game != null ){
            $referrer = null;
            $game->register($user, $referrer);
        }
    }
}
