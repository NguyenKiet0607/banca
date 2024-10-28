<?php

use App\Http\Controllers\Admin\ConfigController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', 'App\Http\Controllers\User\AuthController@showLoginForm')->name('user.login');
Route::post('/login', 'App\Http\Controllers\User\AuthController@login')->name('action_login');
Route::post('/register', 'App\Http\Controllers\User\UserController@store');

Route::middleware('user.login')->group(function (){
    Route::get('/', 'App\Http\Controllers\User\GameController@index')->name('top-page');
    Route::get('/slot/{slug}', 'App\Http\Controllers\User\GameController@slot')->middleware('check.coin')->name('slot');
    Route::get('/game/{slug}/{id}', 'App\Http\Controllers\User\GameController@detailSlot')->middleware('check.coin')->name('detail-slot');
    Route::post('/logout', 'App\Http\Controllers\User\AuthController@logout');
    Route::post('/code', 'App\Http\Controllers\User\UserController@code')->name('code');
    Route::prefix('api')->group(function() {
        Route::get('/user/current', 'App\Http\Controllers\User\UserController@profile');
        Route::post('/user/decrease-coin', 'App\Http\Controllers\User\UserController@decreaseCoin');
        Route::get('/games', 'App\Http\Controllers\User\GameController@games');
        Route::get('/game/detail/{slug}', 'App\Http\Controllers\User\GameController@detailGame');
        Route::post('/games/percentage', 'App\Http\Controllers\User\GameController@percentage');
        Route::get('/game/round/{slug}', 'App\Http\Controllers\User\GameController@round');
    });

});


Route::get('/admin/login', 'App\Http\Controllers\Admin\AuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.action_login');
Route::middleware('admin.login')->group(function (){
    Route::get('/admin', function () {
        return view('admin.index');
    });
    //logout admin
    Route::post('/admin/logout', 'App\Http\Controllers\Admin\AuthController@logout')->name('admin.logout');
    Route::resource('/admin/admins', 'App\Http\Controllers\Admin\AdminController')->middleware('admin.super');
    Route::get('/admin/config', [ConfigController::class, 'index'])->name('config.index')->middleware('admin.super');
    Route::post('/admin/config', [ConfigController::class, 'update'])->name('config.update')->middleware('admin.super');
    Route::resource('/admin/users', 'App\Http\Controllers\Admin\UserController')->middleware('admin.admin');
    Route::resource('/admin/codes', 'App\Http\Controllers\Admin\CodeController')->middleware('admin.admin');
    Route::resource('/admin/games', 'App\Http\Controllers\Admin\GameController')->middleware('admin.develop');
    //add credit
    Route::post('/admin/credit/add', 'App\Http\Controllers\Admin\CreditController@add')->name('admin.credit.add');
});
