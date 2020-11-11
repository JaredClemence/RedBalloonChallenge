<?php

namespace App\Http\Service;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Game;

class ReferrerService
{
    private $game;
    
    public function getAffiliateLink(User $user){
        return route('affiliate_link',['username'=>$user->username]);
    }
    
    public function rememberReferrer(User $user){
        $user = null;
        if( $username != null ){
            $user = $this->loadUserByUsername($username);
            
        }
        session(['referrer'=>$user]);
    }
    
    public function getReferrerId(){
        $user = session('referrer');
        $id = null;
        if( $user ){
            $id = $user->id;
        }
        return $id;
    }

    private function loadUserByUsername($username) {
        $user = User::where('username',$username)->first();
        if( $user === null ){
            Log::info("A referrer link provided a bad username. '$username' does not currently exist within this system.");
        }
        return $user;
    }

    public function setActiveGame(Game $game) {
        $this->game = $game;
    }

    public function registerUserForGame(Request $request) {
        
    }

}
