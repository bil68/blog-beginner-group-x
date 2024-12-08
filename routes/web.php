<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/about-group', function () {
    return view('about-group');
})->name('about-group');
// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');


Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('articles', ArticleController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
