<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apps\DirectorioController;
use App\Http\Controllers\apps\UsuarioController;


Route::get('/', [DirectorioController::class, 'index'])->name('directorio');
Route::post('/usuarios', [UsuarioController::class, 'buscar'])->name('usuarios');
Route::get('/usuarios', [UsuarioController::class, 'obtenerTodos'])->name('usuarios');
Route::get('/registro', [UsuarioController::class, 'formularioRegistro'])->name('registro');
// Route::post('/registro', [UsuarioController::class, 'registrarUsuario'])->name('registrar.usuario');
