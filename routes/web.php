<?php

use App\Livewire\AboutMe;
use App\Livewire\Article;
use App\Livewire\Blog;
use App\Livewire\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class);
Route::get('/about-me', AboutMe::class);
Route::get('/blog', Blog::class)->name('posts.index');
Route::get('/blog/{year}/{month}/{day}/{slug}', Article::class)->name('posts.show');