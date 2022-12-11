<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialMedia\GithubLoginController;
use App\Http\Controllers\SocialMedia\GoogleLoginController;
use App\Http\Controllers\SocialMedia\FacebookLoginController;

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

Route::get('/', function () {
    return view('login_page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/sign-in/github', [GithubLoginController::class, 'github']);
Route::get('/sign-in/github/redirect', [GithubLoginController::class, 'githubRedirect']);

Route::get('/sign-in/google', [GoogleLoginController::class, 'google']);
Route::get('/sign-in/google/redirect', [GoogleLoginController::class, 'googleRedirect']);

Route::get('/sign-in/facebook', [FacebookLoginController::class, 'facebook']);
Route::get('/sign-in/facebook/redirect', [FacebookLoginController::class, 'facebookRedirect']);