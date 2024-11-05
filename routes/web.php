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

//default view 
Route::get('/', function () {
    return view('welcome');
});

//index function (home view)
Route::resource('post', PostController::class);

//create function (create view)
Route::resource('create', PostController::class);