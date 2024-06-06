<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class,"home"])->name('home');
Route::get('/profile', [FrontController::class,"profile"])->name("pages.profile");
Route::put('/update-profile', [FrontController::class, 'update_profile'])->name('pages.update.profile');
Route::resource('articles',ArticleController::class);
Route::resource('categories',CategoryController::class);
Route::post('/articles/search', [ArticleController::class,"search"])->name('articles.search');



Route::get('/dettaglio-articolo/{slug}', function () {
    return view('pages.detail');
});

