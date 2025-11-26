<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\TesteController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SubjectController;


/*
|--------------------------------------------------------------------------|
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------|
*/

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/sobre', fn() => view('about'))->name('about');
Route::get('/teste', [TesteController::class, 'index']);


/*
|--------------------------------------------------------------------------|
| PERFIL (Breeze)
|--------------------------------------------------------------------------|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------|
| ROTAS VISÍVEIS PARA TODOS OS LOGADOS (aluno + monitor)
|--------------------------------------------------------------------------|
*/

// Subjects — apenas listar/ver para alunos
Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('subjects/show/{subject}', [SubjectController::class, 'show'])->name('subjects.show');

// Monitors — apenas listar (index) para alunos
Route::get('monitors', [MonitorController::class, 'index'])->name('monitors.index');

// Disponibilidades — apenas listar/ver para alunos
Route::get('availabilities', [AvailabilityController::class, 'index'])->name('availabilities.index');
Route::get('availabilities/show/{availability}', [AvailabilityController::class, 'show'])->name('availabilities.show');

// Sessions — aluno pode criar e ver, mas não editar
Route::resource('sessions', SessionController::class)->only(['index', 'show', 'create', 'store']);

// Avaliação
Route::get('/sessions/{session}/rate', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');


/*
|--------------------------------------------------------------------------|
| ROTAS RESTRITAS APENAS A MONITORES (admin do sistema)
|--------------------------------------------------------------------------|
*/

Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':monitor'])->group(function () {

    // Subjects — CRUD completo
    Route::get('subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    // Monitors — CRUD completo
    Route::get('monitors/create', [MonitorController::class, 'create'])->name('monitors.create');
    Route::post('monitors', [MonitorController::class, 'store'])->name('monitors.store');
    Route::get('monitors/{monitor}/edit', [MonitorController::class, 'edit'])->name('monitors.edit');
    Route::put('monitors/{monitor}', [MonitorController::class, 'update'])->name('monitors.update');
    Route::delete('monitors/{monitor}', [MonitorController::class, 'destroy'])->name('monitors.destroy');

    // Availabilities — CRUD completo
    Route::get('availabilities/create', [AvailabilityController::class, 'create'])->name('availabilities.create');
    Route::post('availabilities', [AvailabilityController::class, 'store'])->name('availabilities.store');
    Route::get('availabilities/{availability}/edit', [AvailabilityController::class, 'edit'])->name('availabilities.edit');
    Route::put('availabilities/{availability}', [AvailabilityController::class, 'update'])->name('availabilities.update');
    Route::delete('availabilities/{availability}', [AvailabilityController::class, 'destroy'])->name('availabilities.destroy');

    // Sessions — apenas monitores podem editar/deletar
    Route::resource('sessions', SessionController::class)->only(['edit', 'update', 'destroy']);
});


/*
|--------------------------------------------------------------------------|
| BREEZE AUTH
|--------------------------------------------------------------------------|
*/
require __DIR__ . '/auth.php';
