<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sent', 'SentmsgController@post')->name('sent');


/* rota de paticipantes*/
Route::get('landingpage/login', 'LandingPage\LandingPageController@showLogin')->name('login_lp');
Route::post('landingpage/login', 'LandingPage\LandingPageController@doLogin')->name('do_login_lp');
