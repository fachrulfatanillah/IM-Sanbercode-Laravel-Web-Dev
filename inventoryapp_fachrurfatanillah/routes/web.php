<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);
Route::get('/home', [Home::class, 'home']);
