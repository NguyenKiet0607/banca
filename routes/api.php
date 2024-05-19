<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/api/register', 'App\Http\Controllers\Api\ApiUserController@register');
Route::group([
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('api.login');
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile'])->middleware('api.login');
    Route::post('/change-pass', [AuthController::class, 'changePassWord'])->middleware('api.login');
});

Route::group([
    'middleware' => 'api.login',
    'prefix' => 'api'
], function () {
    // Route::post('/user/code', 'App\Http\Controllers\Api\CreditController@add')->name('user.code');
    // Route::post('/user/reduce', 'App\Http\Controllers\Api\CreditController@reduce')->name('user.reduce');
    // Route::get('/app/games', 'App\Http\Controllers\Api\ApiGameController@index');
    //List game
    Route::get('/app/games', 'App\Http\Controllers\Api\ApiGameController@games');
    //Detail game, truyen vao slug hoac id
    Route::get('/app/game/detail/{slug}', 'App\Http\Controllers\Api\ApiGameController@detailGame');
    //Ty le, truyen vao ids=[]
    Route::post('/app/games/percentage', 'App\Http\Controllers\Api\ApiGameController@percentage');
    //Tru tien
    Route::post('/app/user/decrease-coin', 'App\Http\Controllers\Api\ApiUserController@decreaseCoin');
    //Nap code
    Route::post('/code', 'App\Http\Controllers\Api\ApiUserController@code')->name('api.code');
});