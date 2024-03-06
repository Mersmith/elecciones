<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Livewire\Administrador\UsuarioCrear;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('usuario', 'vistaTodas')->name('usuario.vista.todas');
    Route::get('usuario/crear', 'vistaCrear')->name('usuario.vista.crear');
    Route::post('usuario/crear', 'crear')->name('usuario.crear');
    Route::get('usuario/ver/{id}', 'vistaVer')->name('usuario.vista.ver');
    Route::get('usuario/editar/{id}', 'vistaEditar')->name('usuario.vista.editar');
    Route::put('usuario/editar/{id}', 'editar')->name('usuario.editar');
    Route::delete('usuario/eliminar/{id}', 'eliminar')->name('usuario.eliminar');
    Route::get('usuario/rol/{id}', 'vistaAsignarRol')->name('usuario.vista.asignar.rol');
    Route::put('usuario/rol/{id}', 'asignarRol')->name('usuario.asignar.rol');
});

Route::get('/administrador/usuario/crear', UsuarioCrear::class)->name('administrador.usuario.crear');

Route::controller(RolController::class)->group(function () {
    Route::get('rol', 'vistaTodas')->name('rol.vista.todas');
    Route::get('rol/crear', 'vistaCrear')->name('rol.vista.crear');
    Route::post('rol/crear', 'crear')->name('rol.crear');
    Route::get('rol/ver/{id}', 'vistaVer')->name('rol.vista.ver');
    Route::get('rol/editar/{id}', 'vistaEditar')->name('rol.vista.editar');
    Route::put('rol/editar/{id}', 'editar')->name('rol.editar');
    Route::delete('rol/eliminar/{id}', 'eliminar')->name('rol.eliminar');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
