<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Routers;
use App\Http\Routers\AbstractGameBasedRedirect as ParentRedirect;

/**
 * Description of NoGameRedirect
 *
 * @author jaredclemence
 */
class NoGameRedirect extends ParentRedirect {
    protected function shouldRedirect() {
        return $this->first == null;
    }
    
    protected function getRedirectRoute(){
        return redirect()->route('game.create');
    }
}
