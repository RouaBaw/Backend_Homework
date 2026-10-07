<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index']);
Route::get('/books/{id}', [\App\Http\Controllers\BookController::class, 'show']);
Route::post('/books', [\App\Http\Controllers\BookController::class, 'store']);
Route::put('/books/{id}', [\App\Http\Controllers\BookController::class, 'update']);
Route::delete('/books/{id}', [\App\Http\Controllers\BookController::class, 'delete']);
