<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/**
 * /post/ -> GET index()
 * /post/{ ID of a post } -> GET show()
 * /post/create -> GET create()
 * ...
 **/

//default 
Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);