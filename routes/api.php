<?php

use Illuminate\Http\Request;

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

Route::resource('events', 'Api\EventController', [
    'except' => ['edit', 'show']
]);

Route::resource('users', 'Api\UserController', [
    'except' => ['edit', 'show']
]);


