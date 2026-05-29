<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CancionAdminController;
use App\Http\Controllers\Admin\UsuarioAdminController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\SesionController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\ListaReproduccionController;
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

    // Catálogo de canciones
    Route::get('/canciones',             [CancionController::class, 'index'])->name('canciones.index');
    Route::get('/canciones/buscar', [CancionController::class, 'buscar'])->name('canciones.buscar');
    Route::get('/canciones/{cancion}',   [CancionController::class, 'mostrar'])->name('canciones.mostrar');

    // Listas de reproducción
    Route::get('/listas-reproduccion',                                [ListaReproduccionController::class, 'index'])->name('listas.index');
    Route::get('/listas-reproduccion/crear',                          [ListaReproduccionController::class, 'crear'])->name('listas.crear');
    Route::post('/listas-reproduccion',                               [ListaReproduccionController::class, 'guardar'])->name('listas.guardar');
    Route::get('/listas-reproduccion/{lista}',                        [ListaReproduccionController::class, 'mostrar'])->name('listas.mostrar');
    Route::get('/listas-reproduccion/{lista}/editar',                 [ListaReproduccionController::class, 'editar'])->name('listas.editar');
    Route::put('/listas-reproduccion/{lista}',                        [ListaReproduccionController::class, 'actualizar'])->name('listas.actualizar');
    Route::delete('/listas-reproduccion/{lista}',                     [ListaReproduccionController::class, 'eliminar'])->name('listas.eliminar');
    Route::post('/listas-reproduccion/{lista}/canciones',             [ListaReproduccionController::class, 'agregarCancion'])->name('listas.agregar-cancion');
    Route::delete('/listas-reproduccion/{lista}/canciones/{cancion}', [ListaReproduccionController::class, 'quitarCancion'])->name('listas.quitar-cancion');
});

// Rutas de administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/inicio', [AdminController::class, 'inicio'])->name('inicio');

    // Gestión de canciones
    Route::get('/canciones',                  [CancionAdminController::class, 'index'])->name('canciones.index');
    Route::get('/canciones/crear',            [CancionAdminController::class, 'crear'])->name('canciones.crear');
    Route::post('/canciones',                 [CancionAdminController::class, 'guardar'])->name('canciones.guardar');
    Route::get('/canciones/{cancion}/editar', [CancionAdminController::class, 'editar'])->name('canciones.editar');
    Route::put('/canciones/{cancion}',        [CancionAdminController::class, 'actualizar'])->name('canciones.actualizar');
    Route::delete('/canciones/{cancion}',     [CancionAdminController::class, 'eliminar'])->name('canciones.eliminar');

    // Gestión de usuarios
    Route::get('/usuarios',                    [UsuarioAdminController::class, 'index'])->name('usuarios.index');
    Route::patch('/usuarios/{usuario}/toggle', [UsuarioAdminController::class, 'toggleActivo'])->name('usuarios.toggle');
});
