<?php

use App\Livewire\Home;
use App\Livewire\PostDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/post/{post}', PostDetail::class)->name('post.show');
Route::get('/categories', \App\Livewire\Categories::class)->name('categories');
Route::get('/archives', \App\Livewire\Archives::class)->name('archives');
Route::get('/friends', \App\Livewire\Friends::class)->name('friends');
