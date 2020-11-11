<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Game;

/**
 * @property bool $opted_in_emails
 * @property int $node_value
 * @property int $tree_depth
 */
class GameRegistration extends Pivot
{
    protected $fillable = [
        'game_id',
        'user_id',
        'referred_by',
        'opted_in_emails'
    ];
    
    /**
     * @return bool
     */
    public function wantsEmail() {
        return $this->opted_in_emails;
    }
    public function opt_in(){
        $this->opted_in_emails = true;
    }
    public function opt_out(){
        $this->opted_in_emails = false;
    }
    public function game(){
        return $this->hasOne(Game::class, 'id','game_id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    
    public function referredBy(){
        return $this->hasOne(GameRegistration::class, 'id','referred_by')->withDefault();
    }
}
