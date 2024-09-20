<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RestauranteController;

Route::get('/pratos', [PratoController::class, 'index']);
Route::get('/pratos/{id}', [PratoController::class, 'show']);

Route::middleware("auth:sanctum")->group(function () {
Route::post('/pratos', [PratoController::class, 'store']);
Route::put('/pratos/{id}', [PratoController::class, 'update']);
Route::delete('/pratos/{id}', [PratoController::class, 'destroy']);
});

Route::get('/restaurantes', [RestauranteController::class, 'index']);
Route::get('/restaurantes/{id}', [RestauranteController::class, 'show']);

Route::middleware("auth:sanctum")->group(function () {
Route::post('/restaurantes', [RestauranteController::class, 'store']);
Route::put('/restaurantes/{id}', [RestauranteController::class, 'update']);
Route::delete('/restaurantes/{id}', [RestauranteController::class, 'destroy']);
Route::apiResource('restaurantes', RestauranteController::class);
});




Route::post('/register', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    return response()->json(['message' => 'Usuario registrado com sucesso']);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['login incorreto.'],
        ]);
    }

    $token = $user->createToken('auth-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->tokens()->delete();

    return response()->json(['message' => 'desconectado com sucesso ']);
});
