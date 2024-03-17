<?php

use App\Http\Controllers\Socio\SocioPerfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', SocioPerfilController::class)->name('perfil');