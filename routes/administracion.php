<?php

use App\Http\Controllers\EleccionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Livewire\Administrador\AdministradorTodas;
use App\Livewire\Eleccion\EleccionAsigarCandidato;
use App\Livewire\Socio\SocioTodas;
use App\Livewire\Usuario\UsuarioCrear;
use App\Livewire\Usuario\UsuarioTodas;
use App\Livewire\Votacion\VotacionResultados;
use Illuminate\Support\Facades\Route;

Route::get('/usuario', UsuarioTodas::class)->name('usuario.todas');
Route::controller(UserController::class)->group(function () {
    Route::get('usuario/ver/{id}', 'vistaVer')->name('usuario.vista.ver');
    Route::get('usuario/editar/{id}', 'vistaEditar')->name('usuario.vista.editar');
    Route::put('usuario/editar/{id}', 'editar')->name('usuario.editar');
    Route::delete('usuario/eliminar/{id}', 'eliminar')->name('usuario.eliminar');
    Route::get('usuario/rol/{id}', 'vistaAsignarRol')->name('usuario.vista.asignar.rol');
    Route::put('usuario/rol/{id}', 'asignarRol')->name('usuario.asignar.rol');
});
Route::get('/usuario/crear', UsuarioCrear::class)->name('usuario.crear');

Route::controller(RolController::class)->group(function () {
    Route::get('rol', 'vistaTodas')->name('rol.vista.todas');
    Route::get('rol/crear', 'vistaCrear')->name('rol.vista.crear');
    Route::post('rol/crear', 'crear')->name('rol.crear');
    Route::get('rol/ver/{id}', 'vistaVer')->name('rol.vista.ver');
    Route::get('rol/editar/{id}', 'vistaEditar')->name('rol.vista.editar');
    Route::put('rol/editar/{id}', 'editar')->name('rol.editar');
    Route::delete('rol/eliminar/{id}', 'eliminar')->name('rol.eliminar');
});

Route::get('/administrador', AdministradorTodas::class)->name('administrador.vista.todas');

Route::get('/socio', SocioTodas::class)->name('socio.vista.todas');

Route::controller(EleccionController::class)->group(function () {
    Route::get('eleccion', 'vistaTodas')->name('eleccion.vista.todas');
    Route::get('eleccion/crear', 'vistaCrear')->name('eleccion.vista.crear');
    Route::post('eleccion/crear', 'crear')->name('eleccion.crear');
    Route::get('eleccion/ver/{id}', 'vistaVer')->name('eleccion.vista.ver');
    Route::get('eleccion/editar/{id}', 'vistaEditar')->name('eleccion.vista.editar');
    Route::put('eleccion/editar/{id}', 'editar')->name('eleccion.editar');
    Route::delete('eleccion/eliminar/{id}', 'eliminar')->name('eleccion.eliminar');
});
Route::get('/eleccion/{id}/candidato', EleccionAsigarCandidato::class)->name('eleccion.asignar.candidato');
Route::get('/eleccion/{id}/votacion/resultados', VotacionResultados::class)->name('eleccion.votacion.resultados');
