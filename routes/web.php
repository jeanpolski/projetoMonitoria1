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
Route::get('/sessions/{session}/rate', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\SubjectController;
Route::resource('subjects', SubjectController::class);

Route::resource('/monitoriaProjeto1', App\Http\Controllers\MonitoriaProjeto1Controller::class);

Route::get('/sobre', function () {
    return view('about');
})->name('about');
