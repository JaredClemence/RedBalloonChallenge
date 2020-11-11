<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware([ 'verified', 'registered', 'auth:sanctum'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/', function () {
        return view('welcome');
    });
    
Route::get('/games/{game}', [\App\Http\Controllers\GameController::class,'show']);
    
Route::get('/affiliate/{username}', [\App\Http\Controllers\Controller::class, 'redirectReferredUser'])->name('affiliate_link');
Route::get('/register/username', function(){
    return view('auth.set-username');
})->name('registration.username');
Route::post('/register/username', [App\Http\Controllers\RegistrationAssistController::class, 'createUsername']);
Route::get('/register/password', function(Request $request){
    return view('auth.set-password');
})->name('registration.password');
Route::post('/register/password', [App\Http\Controllers\RegistrationAssistController::class, 'createPassword']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('registration.username');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::prefix('/{game:shortname}')->group( function(){
    Route::get('/affiliate/{username}',[App\Http\Controllers\GameRegistrationController::class,'referredUser'])->name('game.referrer');
    Route::get('/',[App\Http\Controllers\GameRegistrationController::class,'show'])->name('game.detail');
    Route::get('/register',[App\Http\Controllers\GameRegistrationController::class,'showRegistrationForm'])->name('game.register');
    Route::post('/register',[App\Http\Controllers\GameRegistrationController::class,'create']);
} );