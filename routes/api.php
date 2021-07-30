<?php

use App\Http\Controllers\TodolistController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create',[TodolistController::class, 'create']);

Route::get('/list',[TodolistController::class, 'list']);

Route::get('/listById/{id}',[TodolistController::class, 'listById']);

Route::put('/update/{id}', [TodolistController::class, 'update']);

Route::delete('/deletetask/{id}', [TodolistController::class, 'deletetask']);

Route::post('/markascomplete/{id}', [TodolistController::class, 'complete']);


