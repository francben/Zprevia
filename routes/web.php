<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventosController;

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        //Eventos
        Route::resource('eventos', EventosController::class);
        /*Route::get('/eventos', function () {
            return view('eventos.index');
        })->name('eventos');*/
        Route::get('eventos/activos', [EventosController::class, 'activos'])->name('eventosActivos');
        Route::get('eventos/disponibles', [EventosController::class, 'activos'])->name('eventosDisponibles');
        Route::get('eventos/finalizados', [EventosController::class, 'activos'])->name('eventosFinalizados');
        Route::get('/empresas', function () {
            return view('dashboard');
        })->name('empresas');
        Route::resource('roles', RolController::class);
        Route::resource('usuarios', UsuarioController::class);

    });
