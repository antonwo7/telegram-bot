<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'home', ])->middleware('auth:web')->name('home');
Route::get('/home', [PageController::class, 'home', ])->middleware('auth:web')->name('home');

Route::get('/bot/{bot}', [PageController::class, 'bot'])->middleware('auth:web')->name('bot');

Route::get('/categories', [PageController::class, 'categories'])->middleware('auth:web')->name('categories');

Route::group(['namespace' => 'Category', 'middleware' => 'auth:web'], function(){
    Route::post('/category', 'StoreController')->name('category.store');
    Route::patch('/category/{category}', 'UpdateController')->name('category.update');
    Route::delete('/category/{category}', 'DestroyController')->name('category.destroy');
});

Route::get('/logs', [PageController::class, 'logs'])->middleware('auth:web')->name('logs');

Route::group(['namespace' => 'LogType', 'middleware' => 'auth:web'], function(){
    Route::post('/logtype', 'StoreController')->name('logtype.store');
//    Route::patch('/logtype/{logType}', 'UpdateController')->name('logtype.update');
    Route::delete('/logtype/{logType}', 'DestroyController')->name('logtype.destroy');
});

Route::group(['namespace' => 'Bot', 'middleware' => 'auth:web'], function(){
    Route::post('/bot', 'StoreController')->name('bot.store');
    Route::patch('/bot/{bot}', 'UpdateController')->name('bot.update');
    Route::delete('/bot/{bot}', 'DestroyController')->name('bot.destroy');
});

Route::group(['namespace' => 'Client', 'middleware' => 'auth:web'], function(){
    Route::post('/client', 'WebStoreController')->name('client.webstore');
    Route::patch('/client/{client}', 'UpdateController')->name('client.update');
    Route::delete('/client/{client}', 'DestroyController')->name('client.destroy');
});

Route::get('/logs/{logType}', [PageController::class, 'logs'])->middleware('auth:web');

Auth::routes();

