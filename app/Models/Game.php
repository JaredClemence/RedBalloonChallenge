<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MiniGame;
use App\Models\User;
use App\Models\GameRegistration;


/**
 * The Game holds the primary objective of the social network marketing campaign.
 * It can have games within it (MiniGame), but every campaign must have a Game.
 *  
 * @property string $name
 * @property string $shortname
 * @property string $description
 * @property string $win_condition
 * @property string $prize_description
 * @property string $designed_goal
 * @property Carbon|null $begin
 * @property Carbon|null $end
 * @property int|-1 $min_duration_hours
 * @property int|-1 $max_duration_hours
 */
class Game extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'shortname',
        'total_prizes',
        'game_goal',
        'payout_terms',
        'prize_description',
        'motivation'
    ];
    
    public function register( User $account, GameRegistration $referrer = null ){
        $data = [
            'user_id'=>$account->id,
            'game_id'=>$this->id
        ];
        $registration = GameRegistration::where($data)->first();
        if( $registration ) return;
        
        $data['affiliate_name']=$account->username;
        if( $referrer ){
            $data['tree_depth']=$referrer->tree_depth+1;
            $data['referred_by']=$referrer->id;
        }
        GameRegistration::create( $data );
    }
    
    public function miniGames(){
        return $this->hasMany( MiniGame::class );
    }
    
    public function registrations() {
        return $this->hasMany( GameRegistration::class );
    }
}
