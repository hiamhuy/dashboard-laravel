<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\NavigationPageController;
use App\Http\Controllers\Dashboard\PosttypeController;
use App\Http\Controllers\Dashboard\AccountInfoController;


Route::get('/',[NavigationPageController::class,'index'])->name('navigation-page');

Route::get('/verify',[RegisterController::class,'verifyUser'])->name('verify.user');
Route::get('/logout',[LoginController::class,'logout']) -> name('logout');

Route::middleware('auth')->prefix('/dashboard')->group(function() {
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::prefix('/posttype')->group(function(){
        Route::get('/', [PosttypeController::class,'index'])->name('posttype');

        Route::get('/create/0', [PosttypeController::class,'create'])->name('posttype.create');
        Route::post('/insert', [PosttypeController::class,'insert']);
        
        Route::get('/edit/{id}', [PosttypeController::class,'edit'])->name('posttype.edit');
        Route::post('/update/{id}', [PosttypeController::class,'update']);

        Route::delete('/delete/{id}', [PosttypeController::class,'delete'])->name('posttype.delete');
    });

    Route::prefix('/post')->group(function(){
        Route::get('/', [PostController::class,'index'])->name('post');

        Route::get('/create/0', [PostController::class,'create'])->name('post.create');
        Route::post('/insert', [PostController::class,'insert'])->name('post.insert');
        
        Route::get('/edit/{id}', [PostController::class,'edit'])->name('post.edit');
        Route::post('/update/{id}', [PostController::class,'update'])->name('post.update');

        Route::delete('/delete/{id}', [PostController::class,'delete'])->name('post.delete');
    });

    Route::get('/account-info', [AccountInfoController::class, 'index'])->name('account.info');
    Route::post('/account-info/edit/{id}', [AccountInfoController::class, 'edit'])->name('edit');
  
});
Auth::routes();