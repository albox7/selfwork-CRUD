<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Illuminate\Container\Attributes\Auth;

// Routing delle view
Route::get('/', [PublicController::class, 'Home'])->name('home');

// Routing di Accesso e Registrazione (Fortify)
Route::get('/blog/create', [BlogController::class, 'CreatePost'])->name('blog.create')->middleware('auth');
Route::get('/blog/{id}', [BlogController::class, 'ShowPost'])->name('blog.show');


// Rounting storeage blog
Route::post('/blog', [BlogController::class, 'StorePost'])->name('blog.store')->middleware('auth');