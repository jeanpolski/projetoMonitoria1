<?php

use App\Models\monitoriaProjeto1;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TesteController;
Route::get('/teste', [TesteController::class, 'index']);

use App\Http\Controllers\AvailabilityController;
Route::resource('availabilities', AvailabilityController::class);

use App\Http\Controllers\MonitorController;
Route::resource('monitors', MonitorController::class);

use App\Http\Controllers\SessionController;
Route::resource('sessions', SessionController::class);

use App\Http\Controllers\RatingController;
Route::get('/rating/create/{sessionId}', [RatingController::class, 'create'])->name('rating.create');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/monitoriaProjeto1', App\Http\Controllers\MonitoriaProjeto1Controller::class);
