<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el CRUD de doctores
Route::resource('doctores', DoctorController::class);

use App\Http\Controllers\PacienteController;

// Registro
Route::get('pacientes/registro', [PacienteController::class, 'registro'])->name('pacientes.registro');
Route::post('pacientes/registro', [PacienteController::class, 'registrar'])->name('pacientes.registrar');

// Login
Route::get('pacientes/login', [PacienteController::class, 'login'])->name('pacientes.login');
Route::post('pacientes/login', [PacienteController::class, 'autenticar'])->name('pacientes.autenticar');

// Panel y logout
Route::get('pacientes/panel', [PacienteController::class, 'panel'])->name('pacientes.panel');
Route::post('pacientes/logout', [PacienteController::class, 'logout'])->name('pacientes.logout');

use App\Http\Controllers\CitaController;

Route::get('citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('citas/crear', [CitaController::class, 'create'])->name('citas.create');
Route::post('citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('citas/{id}/cancelar', [CitaController::class, 'cancelar'])->name('citas.cancelar');
