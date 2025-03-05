<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgendamentoController;

Route::get('/agendamento', [AgendamentoController::class, 'index']);
Route::post('/agendamento', [AgendamentoController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
