<?php

use App\Http\Controllers\PratoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RestauranteController;

Route::get('/pratos', [PratoController::class, 'index']);
Route::post('/pratos', [PratoController::class, 'store']);
Route::get('/pratos/{id}', [PratoController::class, 'show']);
Route::put('/pratos/{id}', [PratoController::class, 'update']);
Route::delete('/pratos/{id}', [PratoController::class, 'destroy']);


Route::get('/restaurantes', [RestauranteController::class, 'index']);
Route::post('/restaurantes', [RestauranteController::class, 'store']);
Route::get('/restaurantes/{id}', [RestauranteController::class, 'show']);
Route::put('/restaurantes/{id}', [RestauranteController::class, 'update']);
Route::delete('/restaurantes/{id}', [RestauranteController::class, 'destroy']);
Route::apiResource('restaurantes', RestauranteController::class);

