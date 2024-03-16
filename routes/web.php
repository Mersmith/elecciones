<?php

use App\Http\Controllers\Web\InicioController;
use App\Livewire\Sesion\Administrador\AdministradorIngresar;
use App\Livewire\Sesion\Socio\SocioIngresar;
use App\Livewire\Votacion\VotacionVotar;
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
Route::get('/', InicioController::class)->name('inicio');

Route::get('/admin', AdministradorIngresar::class)->name('ingresar.administrador')->middleware(['verificar.ingreso']);

Route::get('/ingresar', SocioIngresar::class)->name('ingresar.socio');

Route::get('/eleccion/{id}/votacion/votar', VotacionVotar::class)->name('eleccion.votacion.votar');
/*
Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/