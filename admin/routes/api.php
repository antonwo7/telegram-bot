<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function($router){
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});



Route::group(['namespace' => 'Category', 'middleware' => 'jwt.auth'], function(){
    Route::get('/categories', 'IndexController');
});

Route::group(['namespace' => 'Log', 'middleware' => 'jwt.auth'], function(){
    Route::post('/log', 'StoreController');
});

Route::post('/greeting', 'GreetingController')->middleware('jwt.auth');

Route::post('/bot_token', 'BotTokenController')->middleware('jwt.auth');

Route::group(['namespace' => 'Client', 'middleware' => 'jwt.auth'], function(){
    Route::post('/client', 'StoreController')->name('client.store');
    Route::patch('/client/{client}', 'UpdateController')->name('client.update');
    Route::delete('/client/{client}', 'DestroyController')->name('client.destroy');
});
