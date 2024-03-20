<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Web\InicioController;
use App\Livewire\Sesion\Administrador\AdministradorIngresar;
use App\Livewire\Sesion\Socio\SocioIngresar;
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

Route::get('/admin', AdministradorIngresar::class)->name('ingresar.administrador')->middleware(['verificar.ingreso.administrador']);

Route::get('/ingresar', SocioIngresar::class)->name('ingresar.socio')->middleware(['verificar.ingreso.socio']);

Route::get('/generar-constancia-votacion/{votoId}', [PDFController::class, 'generarConstanciaVotacion'])->name('pdf.constancia.votacion');

Route::get('/generar-excel', [ExcelController::class, 'export'])->name('generar.excel');

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