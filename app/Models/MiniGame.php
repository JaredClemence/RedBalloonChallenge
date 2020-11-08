<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

/**
 * The MiniGame allows the user to create gamification around smaller facets around 
 * the Game's main goal. For example, you can create a mini-game to be one of the 
 * last 1,000 people to donate to a charitable campaign to encourage a last minute 
 * surge of donations. Or, you can run a mini-game that gives a prize to the person 
 * with the most direct referrals to encourage participation by social media influencers.
 *  
 * @property string $name
 * @property string $description
 * @property string $win_condition
 * @property string $prize_description
 * @property string $designed_goal
 * @property Carbon|null $begin
 * @property Carbon|null $end
 * @property int|-1 $min_duration_hours
 * @property int|-1 $max_duration_hours
 * @property Game $game
 */
class MiniGame extends Game
{
    use HasFactory;
    
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
