<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('post/{slug}', [PostController::class, 'detail'])->name('post.detail');
Route::get('post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::get('/artikel', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/{id}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/login', [User::class,'index']);
