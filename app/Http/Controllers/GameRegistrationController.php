<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ReferrerService;
use App\Models\GameRegistration;
use App\Models\Game;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;

class GameRegistrationController extends Controller
{
    /* @var ReferrerService */
    private $service;
    
    public function __construct(ReferrerService $service) {
        $this->service = $service;
        $service->setActiveGame( $game );
    }
    public function create(CreateNewUser $request, Game $game){
        $this->service->registerUserForGame($request);
        return redirect()->route('detail',compact('game'));
    }
    public function showRegistrationForm(Game $game){
        $name = $game->shortname;
        $viewName = "games.{$name}.registration";
        return view()->first([$viewName,'games.registration'], compact('game'));
    }
    public function show(Game $game){
        $name = $game->shortname;
        $viewName = "games.{$name}.details";
        return view()->first([$viewName,'games.registration'], compact('game'));
    }
    public function referredUser(Game $game, $username){
        $this->service->rememberReferrer($username);
        return redirect()->route('game.register',compact('game'));
    }
}
