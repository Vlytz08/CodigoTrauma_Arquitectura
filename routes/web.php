<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmergenciaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistorialEmergenciasController;
Route::get('/emergencias/create', [EmergenciaController::class, 'create'])->name('emergencias.create');

Route::post('/registro', [EmergenciaController::class, 'store'])->name('emergencias.store'); 
Route::get('/doctores', [DoctorController::class, 'mostrarDoctores']);
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/historial-emergencias', [HistorialEmergenciasController::class, 'index'])->name('historial.emergencias.index');
Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/doctores', function () {
    return view('doctores');
})->middleware(['auth', 'verified'])->name('doctores');

Route::get('/registro', function () {
    return view('registro');
})->middleware(['auth', 'verified'])->name('registro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
