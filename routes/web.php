<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;


Route::get('/ping', fn() => 'pong');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles',        [ArticleController::class, 'store'])->name('articles.store');




