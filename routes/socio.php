<?php

use App\Http\Controllers\Socio\MisEleccionesController;
use App\Http\Controllers\Socio\MisVotosController;
use App\Http\Controllers\Socio\SocioPerfilController;
use App\Livewire\Socio\Votacion\VotacionVotar;
use Illuminate\Support\Facades\Route;

Route::get('/mi-perfil', SocioPerfilController::class)->name('perfil');

Route::get('/mis-elecciones', MisEleccionesController::class)->name('eleccion');

Route::get('/mis-votos', MisVotosController::class)->name('voto');

Route::get('/eleccion/{eleccion}/votacion/votar', VotacionVotar::class)->name('eleccion.votacion.votar');