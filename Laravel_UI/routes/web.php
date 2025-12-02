<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

Route::get('/ping', fn() => 'pong');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles',        [ArticleController::class, 'store'])->name('articles.store');

Route::get('/', fn() => redirect()->route('articles.index'));
Route::resource('articles', ArticleController::class)->except(['show']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');
