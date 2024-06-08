<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CavaloController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resource('clientes', ClienteController::class);
Route::get('clientes/{id}/delete', [ClienteController::class, 'delete'])->name('clientes.delete');

Route::resource('cavalos', CavaloController::class);
Route::get('cavalos/{id}/delete', [CavaloController::class, 'delete'])->name('cavalo.delete');

