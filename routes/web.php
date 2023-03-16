<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\AdminMiddleware;
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

Route::get('/', function () {
//    return view('welcome');
//    $goods = \App\Models\Good::query()->get();

//    return view('mainPage');
});

Route::controller(IndexController::class)->group(function ()
{
    Route::get('/', 'mainPage')->name('mainPage');
   Route::get('/signup', 'signup')->name('signup');
   Route::get('/signin', 'signin')->name('signin');
});
Route::controller(\App\Http\Controllers\AuthController::class)->prefix('/auth')->as('auth.')->group(function(){
    Route::post('/signup', 'signup')->name('signup');
    Route::post('/signin', 'signin')->name('signin'); // auth.signin
    Route::get('/logout', 'logout')->name('logout') ;
});

Route::controller(GoodController::class)->prefix('/goods')->as('goods.')->group(function ()
{
    Route::middleware(['auth', AdminMiddleware::class])->group(function(){
        Route::get('/create', 'createForm')->name('createForm');
        Route::post('/create', 'store')->name('create');
    });
});

//Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function ()
//{
//    Route::post('/signup','signup')->name('signup');
//});


