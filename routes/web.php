<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CondominiumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemStatusController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('condominiums/{id}/payments', [CondominiumController::class, 'payments'])->name('condominiums.payments');
    // Rotas CRUD para Condomínios
    Route::resource('condominiums', CondominiumController::class);

    Route::get('users/{id}/payments', [UserController::class, 'payments'])->name('users.payments');
    // Rotas CRUD para Usuários
    Route::resource('users', UserController::class);


    // Rotas CRUD para Status do sistema
    Route::resource('system-status', SystemStatusController::class);

    // Rotas CRUD para Pagamentos
    Route::resource('payments', App\Http\Controllers\PaymentController::class);
});
