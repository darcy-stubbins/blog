<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// defaults to posts if logged in or redirects to login 
Route::get('/', function () {
    return redirect('/post');
});

//PostController routes 
Route::resource('post', PostController::class)->middleware(['auth', 'verified']);

//profile using Laravel Auth
Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'showLoggedInUser'])->name('profile.showLoggedInUser');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__ . '/auth.php';
