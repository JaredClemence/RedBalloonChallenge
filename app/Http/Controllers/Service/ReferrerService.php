<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ReferrerService
{
    public function rememberReferrer($username){
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

}
