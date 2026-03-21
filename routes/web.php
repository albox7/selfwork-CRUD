<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Illuminate\Container\Attributes\Auth;

// Routing delle view
Route::get('/', [PublicController::class, 'Home'])->name('home');

// Routing del blog
Route::get('/blog/create', [BlogController::class, 'CreatePost'])->name('blog.create')->middleware('auth');
Route::post('/blog', [BlogController::class, 'StorePost'])->name('blog.store')->middleware('auth');
Route::get('/blog/{id}/edit', [BlogController::class, 'EditPost'])->name('blog.edit')->middleware('auth');

// Routing di modifica del post (metodo PUT)
Route::put('/blog/{id}', [BlogController::class, 'UpdatePost'])->name('blog.update')->middleware('auth');

// Routing di cancellazione del post (metodo DELETE)
Route::delete('/blog/{id}', [BlogController::class, 'DeletePost'])->name('blog.delete')->middleware('auth');


// Routing delle relazioni

// Many to One
Route::get('/blog/{id}', [BlogController::class, 'ShowPost'])->name('blog.show');

// One to Many
Route::get('/blog/{id}/posts', [BlogController::class, 'UserPosts'])->name('user.posts');


