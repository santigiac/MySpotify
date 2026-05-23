<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\SesionController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Página pública de bienvenida
Route::get('/', function () {
    if (Auth::check()) {
        return redirect(Auth::user()->role === 'admin' ? '/admin/inicio' : '/inicio');
    }
    return view('welcome');
})->name('bienvenida');

// Autenticación
Route::get('/login',    [SesionController::class, 'mostrar'])->name('login');
Route::post('/login',   [SesionController::class, 'entrar'])->name('login.entrar');
Route::get('/registro', [RegistroController::class, 'mostrar'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.guardar');

Route::post('/cerrar-sesion', [SesionController::class, 'salir'])
    ->middleware('auth')
    ->name('cerrar-sesion');

// Rutas de cliente
Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/inicio', [UsuarioController::class, 'inicio'])->name('inicio');
    Route::get('/canciones', [CancionController::class, 'index'])->name('canciones.index');
    Route::get('/canciones/{cancion}', [CancionController::class, 'mostrar'])->name('canciones.mostrar');
    Route::get('/listas-reproduccion', function () {
        return view('cliente.inicio');
    })->name('listas-reproduccion');
});

// Rutas de administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/inicio',    [AdminController::class, 'inicio'])->name('inicio');
    Route::get('/canciones', [AdminController::class, 'canciones'])->name('canciones');
    Route::get('/usuarios',  [AdminController::class, 'usuarios'])->name('usuarios');
});
