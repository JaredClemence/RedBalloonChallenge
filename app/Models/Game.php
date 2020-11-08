<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MiniGame;

/**
 * The Game holds the primary objective of the social network marketing campaign.
 * It can have games within it (MiniGame), but every campaign must have a Game.
 *  
 * @property string $name
 * @property string $description
 * @property string $win_condition
 * @property string $prize_description
 * @property string $designed_goal
 * @property Carbon|null $begin
 * @property Carbon|null $end
 * @property int|-1 $min_duration_hours
 * @porperty int|-1 $max_duration_hours
 */
class Game extends Model
{
    use HasFactory;
    
    public function miniGames(){
        return $this->hasMany( MiniGame::class );
    }
}
