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

Route::resource('tasks', 'App\Http\Controllers\TaskController');

Route::resource('task-states', 'App\Http\Controllers\TaskStateController');

Route::resource('users', 'App\Http\Controllers\UserController');

