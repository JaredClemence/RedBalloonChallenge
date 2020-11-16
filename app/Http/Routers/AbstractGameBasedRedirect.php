<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Routers;
use App\Http\Routers\ConditionalRouteRedirect;
use App\Http\Service\GamesService;
use App\Models\Game;

/**
 * Description of AbstractGameBasedRedirect
 *
 * @author jaredclemence
 */
abstract class AbstractGameBasedRedirect extends ConditionalRouteRedirect {
    /* @var $gameService GamesService */
    private $gameService;
    /* @var $game Game */
    protected $first;
    
    public function __construct(GamesService $service ){
        $this->gameService = $service;
        $this->first = $service->first();
    }
    
    /**
     * @returns GamesService
     */
    protected function getGamesService(){ return $this->gameService; }
}
