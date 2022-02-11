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
Route::get('portal/login', 'LandingPage\LandingPageController@showLogin')->name('login_lp');
Route::post('portal/login', 'LandingPage\LandingPageController@doLogin')->name('do_login_lp');
Route::prefix('portal')->middleware( ['auth.yeshmeet_lp_participant'])->group(function () {
    Route::get('/index', 'LandingPage\LandingPageController@index')->name('index_lp');   
});
Route::get('prod/getProd/{id}', 'Produtos\ProdController@getProd')->name('get_prod');
Route::get('prod/updateProd/{id}', 'Produtos\ProdController@updateProd')->name('update_prod');
Route::prefix('prod')->middleware( ['auth.yeshmeet_lp_participant'])->group(function () {
    Route::get('/index/{id}', 'Produtos\ProdController@index')->name('index_prod');
});



/*
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        Route::post('landingpage/index', 'LandingPage\LandingPageController@showLogin')->name('index_lp');
    })->middleware(['first']);
    
   ;


Route::get('/', function () {
    //
})->middleware(['auth.yeshmeet_lp_participant', 'guest']);

*/

   
