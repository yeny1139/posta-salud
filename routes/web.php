<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PersonalMedicoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::resource('pacientes', PacienteController::class);

Route::resource('personal-medico', PersonalMedicoController::class)
    ->parameters(['personal-medico' => 'personalMedico'])
    ->except(['destroy']);

Route::patch('personal-medico/{personalMedico}/estado',
    [PersonalMedicoController::class, 'cambiarEstado'])
    ->name('personal-medico.estado');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';