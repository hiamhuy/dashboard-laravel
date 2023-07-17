<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PosttypeController;

// Route::get('home', [HomeController::class,'index']);
Route::get('posttype', [PosttypeController::class,'index']);
Route::get('post', [PostController::class,'index']);

Route::get('/', [HomeController::class,'index']);