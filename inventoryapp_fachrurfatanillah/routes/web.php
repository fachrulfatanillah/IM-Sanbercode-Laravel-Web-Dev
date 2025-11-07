<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/category/create', [CategoriesController::class, 'create']);
Route::post('/category', [CategoriesController::class, 'store']);
Route::get('/category', [CategoriesController::class, 'index']);
Route::get('/category/{id}', [CategoriesController::class, 'show']);
Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/category/{id}', [CategoriesController::class, 'update']);
Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{category}/{id}/detail/{name}', [ProductsController::class, 'show']);
Route::get('/products/create', [ProductsController::class, 'create']);
Route::post('/products/create', [ProductsController::class, 'store']);
Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
Route::put('/products/edit/{id}', [ProductsController::class, 'update']);
Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy']);

Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::get('/profile/change-password', [ProfileController::class, 'changePassword']);

Route::get('/logout', [LogoutController::class, 'logout']);
