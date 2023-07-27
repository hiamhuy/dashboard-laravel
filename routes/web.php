<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\NavigationPageController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\AccountInfoController;


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
    Route::prefix('/he-thong')->group(function(){
        Route::prefix('/user')->group(function(){
            Route::get('/', [UserController::class,'index'])->name('system.user');


        });

        Route::prefix('/role')->group(function(){
            Route::get('/', [RolesController::class,'index'])->name('system.role');
            
            Route::get('/create/0', [RolesController::class,'create'])->name('post.create');
            Route::post('/insert', [RolesController::class,'insert'])->name('post.insert');

        });

        Route::prefix('/permission')->group(function(){
            Route::get('/', [PermissionController::class,'index'])->name('system.permission');


        });

    });

    Route::get('/account-info', [AccountInfoController::class, 'index'])->name('account.info');
    Route::post('/account-info/edit/{id}', [AccountInfoController::class, 'edit'])->name('edit');
  
});
Auth::routes();

Route::middleware('web')->group( function (){

    Route::get('/web/blog',[BlogController::class,'index']) -> name('blog');

    Route::get('/web/about-us',[BlogController::class,'aboutUs']) -> name('aboutus');

    Route::get('/get-data/{skip}{take}',[BlogController::class,'getItemGrid']);
    
    Route::get('/web/contact',[BlogController::class,'contact']) -> name('contact');
    
    Route::get('/web/blog/{slug}',[BlogController::class,'getBlogDetail']) -> name('blog.detail.slug');
    
    Route::get('/web/blog/{categoryId}',[BlogController::class,'getItemByCategory']) -> name('blog.category.search');
});