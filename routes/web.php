<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;

Route::prefix('admin')->middleware('auth', 'user')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard')->middleware('admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'contactSubmit'])->name('contact');
Route::get('/blog/{slug}', [PagesController::class, 'single'])->name('blog.single');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
