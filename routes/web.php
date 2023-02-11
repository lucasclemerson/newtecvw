<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CategoryController;


Route::get('/', [CarsController::class, 'index']);

//cars
Route::get('/cars', [CarsController::class, 'cars'])->middleware('auth');
Route::get('/cars/create', [CarsController::class, 'create'])->middleware('auth');
Route::post('/cars', [CarsController::class, 'store'])->middleware('auth');
Route::delete('/cars/{id}', [CarsController::class, 'destroy'])->middleware('auth');
Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->middleware('auth');
Route::put('/cars/update/{id}', [CarsController::class, 'update'])->middleware('auth');


//categorys
Route::get('/categorys', [CategoryController::class, 'categorys'])->middleware('auth');
Route::get('/categorys/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/categorys', [CategoryController::class, 'store'])->middleware('auth');
Route::delete('/categorys/{id}', [CategoryController::class, 'destroy'])->middleware('auth');
Route::get('/categorys/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/categorys/update/{id}', [CategoryController::class,'update'])->middleware('auth');