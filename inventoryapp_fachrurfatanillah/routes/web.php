<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);
Route::get('/home', [Home::class, 'home']);


Route::get('/master', function () {
    return view('component.master');
});

Route::get('/genre/create', [CategoriesController::class, 'create']);
Route::post('/genre', [CategoriesController::class, 'store']);

Route::get('/genre', [CategoriesController::class, 'index']);
Route::get('/genre/{id}', [CategoriesController::class, 'show']);


Route::get('/genre/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/genre/{id}', [CategoriesController::class, 'update']);


Route::delete('/genre/{id}', [CategoriesController::class, 'destroy']);
