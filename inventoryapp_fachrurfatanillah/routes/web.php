<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'register']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/category/create', [CategoriesController::class, 'create']);
    Route::post('/category', [CategoriesController::class, 'store']);
    Route::get('/category', [CategoriesController::class, 'index']);
    Route::get('/category/{id}', [CategoriesController::class, 'show']);
    Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('/category/{id}', [CategoriesController::class, 'update']);
    Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/products/{category}/{id}/detail/{name}', [ProductsController::class, 'show']);
    Route::get('/products/create', [ProductsController::class, 'create']);
    Route::post('/products/create', [ProductsController::class, 'store']);
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
    Route::put('/products/edit/{id}', [ProductsController::class, 'update']);
    Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/edit', [ProfileController::class, 'save']);
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword']);
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword']);

    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::get('/transaction/create', [TransactionController::class, 'create']);
    Route::post('/transaction/create', [TransactionController::class, 'store']);

    Route::post('/logout', [LogoutController::class, 'logout']);
});

// Route::get('/category/create', [CategoriesController::class, 'create']);
// Route::post('/category', [CategoriesController::class, 'store']);
// Route::get('/category', [CategoriesController::class, 'index']);
// Route::get('/category/{id}', [CategoriesController::class, 'show']);
// Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
// Route::put('/category/{id}', [CategoriesController::class, 'update']);
// Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);

// Route::get('/products', [ProductsController::class, 'index']);
// Route::get('/products/{category}/{id}/detail/{name}', [ProductsController::class, 'show']);
// Route::get('/products/create', [ProductsController::class, 'create']);
// Route::post('/products/create', [ProductsController::class, 'store']);
// Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
// Route::put('/products/edit/{id}', [ProductsController::class, 'update']);
// Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy']);

// Route::get('/profile', [ProfileController::class, 'profile']);
// Route::get('/profile/edit', [ProfileController::class, 'edit']);
// Route::get('/profile/change-password', [ProfileController::class, 'changePassword']);

// Route::post('/logout', [LogoutController::class, 'logout']);
