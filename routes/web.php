<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\CompanysController;

Route::redirect('/', '/eventos');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Eventos
   // Rutas específicas primero
    Route::get('eventos/activos', [EventosController::class, 'activos'])->name('eventosActivos');
    Route::get('eventos/disponibles', [EventosController::class, 'index'])->name('eventosDisponibles');
    Route::get('eventos/finalizados', [EventosController::class, 'finalizados'])->name('eventosFinalizados');
    Route::post('/participar/{id}', [EventosController::class, 'participar'])->name('evento.participar');
    Route::get('eventos/participantes/{id}', [EventosController::class, 'participantes'])->name('evento.participantes');
    Route::get('eventos/completarpago/{id}', [EventosController::class, 'completarpago'])->name('evento.completarpago');

    Route::resource('eventos', EventosController::class);

    //empresas 
    Route::get('/empresas', [CompanysController::class, 'index'])->name('empresas');

    
    //usuarios
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});

