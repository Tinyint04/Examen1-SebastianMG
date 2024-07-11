<?php

use App\Http\Controllers\ApuestaController;

Route::get('/apuestas', [ApuestaController::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/create', [ApuestaController::class, 'create'])->name('apuestas.create');
Route::post('/apuestas', [ApuestaController::class, 'store'])->name('apuestas.store');
Route::get('/apuestas/filter', [ApuestaController::class, 'filterByPlayers'])->name('apuestas.filter');
Route::get('/apuestas/compare', [ApuestaController::class, 'compareCardGames'])->name('apuestas.compare');
Route::get('/apuestas/search', [ApuestaController::class, 'search'])->name('apuestas.search');
Route::get('/apuestas/mayor_tres_jugadores', [ApuestaController::class, 'apuestasMayorTresJugadores'])->name('apuestas.mayor_tres_jugadores');
Route::get('/apuestas/comparar_dinero', [ApuestaController::class, 'compararDineroApuestas'])->name('apuestas.comparar_dinero');
Route::get('/apuestas/buscar', [ApuestaController::class, 'buscarPorJuego'])->name('apuestas.buscar');
Route::resource('apuestas', ApuestaController::class);