<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/create', [TodolistController::class, 'store'])->name('create');
Route::get('/todo-all', [TodolistController::class, 'index'])->name('index');
Route::post('/update/{id}', [TodolistController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [TodolistController::class, 'destroy'])->name('delete');

Route::get('/get-complete', [TodolistController::class, 'getcomplete'])->name('get-complete');
Route::get('/incomplete', [TodolistController::class, 'incomplete'])->name('incomplete');


