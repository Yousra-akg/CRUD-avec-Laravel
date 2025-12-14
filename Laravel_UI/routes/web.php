<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('admin.dashboard'));




Route::middleware(['auth'])->group(function () {
     Route::get('/admin', function () {
        return view('admin.dashboard');
     })->name('admin.dashboard');

     Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
});

Route::resource('articles', ArticleController::class)->except(['show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');