<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users/{user?}','API\JSONPlaceholder@getUsers')->name('users');

Route::get('posts/{post?}','API\JSONPlaceholder@getPosts')->name('posts');

Route::get('comments/{post?}','API\JSONPlaceholder@getPostComments')->name('comments');

Route::get('searchPost/{title}','API\JSONPlaceholder@searchPost')->name('searchPost');
