<?php

use App\Models\monitoriaProjeto1;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\SessionController;

Route::resource('sessions', SessionController::class);

Route::get('/teste', [TesteController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/monitoriaProjeto1',App\Http\Controllers\MonitoriaProjeto1Controller::class);