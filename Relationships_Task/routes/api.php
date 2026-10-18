<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Student + Medical File

Route::post('/students', [StudentController::class, 'store']);
Route::post('/students/{id}/medical-file', [StudentController::class,'StoreMedicalFileForStudent']);
Route::get('/students/{id}', [StudentController::class,'getStudentWithMedicalFile']);
Route::get('/students/{id}/medical-file', [StudentController::class,'getMedicalFileByStudent']);
Route::put('/students/{id}/medical-file', [StudentController::class,'updateMedicalFile']);


// Categories

Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class,'retrieve_a_category_by_ID']);
Route::delete('/categories/{id}', [CategoryController::class,'destroy']);

// Products

Route::post('/categories/{id}/products', [ProductController::class,'store']);
Route::get('/products/{id}', [ProductController::class,'retrieve_a_single_product']);
