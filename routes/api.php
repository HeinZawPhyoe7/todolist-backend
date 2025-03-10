<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/create',[TodolistController::class,'store'])->name('create');
Route::get('/todo-all',[TodolistController::class,'index'])->name('index');
Route::post('/update',[TodolistController::class,'update'])->name('update');
Route::delete('/delete/{id}',[TodolistController::class,'destroy'])->name('delete');