<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Service\ReferrerService;
use Illuminate\Support\Facades\Auth;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    
/* @var $referrerService ReferrerService */
    private $referrerService;

    public function __construct(ReferrerService $service) {
        $this->referrerService = $service;
    }
    
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            //'username' => ['required', 'string', 'max:255', 'unique:users'],
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => $this->passwordRules(),
        ])->validate();
        
        $userData = [
            //'username' => $input['username'],
            //'name' => $input['name'],
            'email' => $input['email'],
            //'password' => Hash::make($input['password']),
            'referred_by'=> $this->referrerService->getReferrerId()
        ];

        return User::create($userData);
    }
    public function createUsername(array $input, $user){
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ])->validate();
        
        $user->username = $input['username'];
        if( $user->name == null ) $user->name = $input['username'];
        $user->save();
        
        return $user;
    }
    
    public function createPassword(array $input, $user){
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();
        
        $passwordPlaintext = $input['password'];
        if( strlen($passwordPlaintext) == 0 ){
            $passwordPlaintext = "password";
        }
        $user->password = Hash::make($passwordPlaintext);
        $user->save();
        
        return $user;
    }
}
