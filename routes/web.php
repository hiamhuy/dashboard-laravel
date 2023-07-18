<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\NavigationPageController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\PosttypeController;
use App\Http\Controllers\Dashboard\AccountInfoController;

Route::get('/',[NavigationPageController::class,'index'])->name('navigation-page');

Route::get('/login',[LoginController::class,'index']) -> name('login');
Route::post('/checklogin',[LoginController::class,'checklogin']) -> name('checklogin');
Route::get('/logout',[LoginController::class,'logout']) -> name('logout');

Route::middleware('auth')->prefix('/dashboard')->group(function() {
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::prefix('/posttype')->group(function(){
        Route::get('/', [PosttypeController::class,'index'])->name('posttype');
    });

    Route::prefix('/post')->group(function(){
        Route::get('/', [PostController::class,'index'])->name('post');
    });

    Route::get('/account-info', [AccountInfoController::class, 'index'])->name('account-info');
  
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');