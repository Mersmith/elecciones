<?php

use App\Http\Controllers\EleccionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Livewire\Administrador\AdministradorTodas;
use App\Livewire\Eleccion\EleccionAsignarCandidato;
use App\Livewire\Socio\SocioTodas;
use App\Livewire\Usuario\UsuarioCrear;
use App\Livewire\Usuario\UsuarioTodas;
use App\Livewire\Votacion\VotacionResultados;
use Illuminate\Support\Facades\Route;

Route::get('/usuario', UsuarioTodas::class)->name('usuario.todas');//ok
Route::controller(UserController::class)->group(function () {
    Route::get('usuario/ver/{id}', 'vistaVer')->name('usuario.vista.ver');//ok
    Route::get('usuario/editar/{id}', 'vistaEditar')->name('usuario.vista.editar');
    Route::put('usuario/editar/{id}', 'editar')->name('usuario.editar');
    Route::delete('usuario/eliminar/{id}', 'eliminar')->name('usuario.eliminar');//ok
    Route::get('usuario/rol/{id}', 'vistaAsignarRol')->name('usuario.vista.asignar.rol');//ok
    Route::put('usuario/rol/{id}', 'asignarRol')->name('usuario.asignar.rol');//ok
});
Route::get('/usuario/crear', UsuarioCrear::class)->name('usuario.crear');//ok

Route::controller(RolController::class)->group(function () {
    Route::get('rol', 'vistaTodas')->name('rol.vista.todas');//ok
    Route::get('rol/crear', 'vistaCrear')->name('rol.vista.crear');//ok
    Route::post('rol/crear', 'crear')->name('rol.crear');//ok
    Route::get('rol/ver/{id}', 'vistaVer')->name('rol.vista.ver');//ok
    Route::get('rol/editar/{id}', 'vistaEditar')->name('rol.vista.editar');//ok
    Route::put('rol/editar/{id}', 'editar')->name('rol.editar');//ok
    Route::delete('rol/eliminar/{id}', 'eliminar')->name('rol.eliminar');//ok
});

Route::get('/administrador', AdministradorTodas::class)->name('administrador.vista.todas');//ok

Route::get('/socio', SocioTodas::class)->name('socio.vista.todas');//ok

Route::controller(EleccionController::class)->group(function () {
    Route::get('eleccion', 'vistaTodas')->name('eleccion.vista.todas');//ok
    Route::get('eleccion/crear', 'vistaCrear')->name('eleccion.vista.crear');//ok
    Route::post('eleccion/crear', 'crear')->name('eleccion.crear');//ok
    Route::get('eleccion/ver/{eleccion}', 'vistaVer')->name('eleccion.vista.ver');//ok
    Route::get('eleccion/editar/{id}', 'vistaEditar')->name('eleccion.vista.editar');//ok
    Route::put('eleccion/editar/{id}', 'editar')->name('eleccion.editar');//ok
    Route::delete('eleccion/eliminar/{id}', 'eliminar')->name('eleccion.eliminar');//ok
});
Route::get('/eleccion/{id}/candidato', EleccionAsignarCandidato::class)->name('eleccion.asignar.candidato');
Route::get('/eleccion/{id}/votacion/resultados', VotacionResultados::class)->name('eleccion.votacion.resultados');
