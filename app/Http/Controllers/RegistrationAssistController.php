<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;

class RegistrationAssistController extends Controller
{
    /* @var $createUser CreateNewUser */
    
    public function createUsername(Request $request,CreateNewUser $createUser){
        $user =  $createUser->createUsername($request->input(),Auth::user());
        return redirect(\App\Providers\RouteServiceProvider::HOME);
    }
    
    public function createPassword(Request $request,CreateNewUser $createUser){
        $user = $createUser->createPassword($request->input(),Auth::user());
        return redirect(\App\Providers\RouteServiceProvider::HOME);
    }
}
