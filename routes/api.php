<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/todos', 'App\Http\Controllers\TodoController@create');
Route::get('/todos/{todo}', 'App\Http\Controllers\TodoController@show');
Route::put('/todos/{todo}', 'App\Http\Controllers\TodoController@update');
Route::delete('/todos/{todo}', 'App\Http\Controllers\TodoController@delete');
