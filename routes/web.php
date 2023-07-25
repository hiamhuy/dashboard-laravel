<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\NavigationPageController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\AccountInfoController;
use App\Http\Controllers\Page\BlogController;


Route::get('/',[NavigationPageController::class,'index'])->name('navigation-page');

Route::get('/verify',[RegisterController::class,'verifyUser'])->name('verify.user');
Route::get('/logout',[LoginController::class,'logout']) -> name('logout');

Route::middleware('auth')->prefix('/dashboard')->group(function() {
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::prefix('/category')->group(function(){
        Route::get('/', [CategoryController::class,'index'])->name('category');

        Route::get('/create/0', [CategoryController::class,'create'])->name('category.create');
        Route::post('/insert', [CategoryController::class,'insert']);
        
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class,'update']);

        Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
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

Route::middleware('web')->group( function (){
    Route::get('/blog',[BlogController::class,'index']) -> name('blog');

    Route::get('/about-us',[BlogController::class,'aboutUs']) -> name('aboutus');

    Route::get('/get-data/{skip}{take}',[BlogController::class,'getItemGrid']);
    
    Route::get('/contact',[BlogController::class,'contact']) -> name('contact');
    
    Route::get('/blog/{slug}',[BlogController::class,'getBlogDetail']) -> name('blog.detail.slug');
    
    Route::get('/blog/{categoryId}',[BlogController::class,'getItemByCategory']) -> name('blog.category.search');
});