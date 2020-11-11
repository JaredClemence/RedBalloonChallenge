<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create([
            'name'=>"Red Balloon Challenge",
            'shortname'=>"redballoon1",
            'total_prizes'=>30000000,
            'game_goal'=><<<GOAL
Put the MIT Red Balloon design to work raising money for a worthy cause. 
            Through the sharing of free links, promise of prizes, and a worthy 
            objective, this site hopes to raise $10 million for the Red Cross's 
            world-wide initiatives.
GOAL
            ,
            'payout_terms'=><<<PAYOUT
This project pays all prizes upon completion of the fundraising goal. If the MIT 
    performance is any guide, the payout should occur within 14 days of launch.
PAYOUT
            ,
            'prize_description'=>'$300,000 will be divided among many participants '
            . 'in the fundraising challenge. The maximum prize given to any individual will be $25,000. The minimum prize will be $250.',
            'motivation'=>"The game and it's mini-games are designed to encourage charitable contributions driven by selfish motives. By raising money for charity, you have the opportunity to earn money for your contributions, even if that contribution is just sharing a link." 
        ]);
    }

    private function create($params) {
        Game::firstOrCreate($params);
    }

}
