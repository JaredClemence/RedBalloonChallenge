<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Service;
use App\Models\Game;

/**
 * Description of GamesService
 *
 * @author jaredclemence
 */
class GamesService {
    public function first(){
        return Game::first();
    }
}
