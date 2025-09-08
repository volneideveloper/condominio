<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\CondominiumController;
use App\Http\Controllers\CondominiumImageController;
use App\Http\Controllers\CondominiumStatusController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('condominio',CondominiumController::class);
    Route::resource('condominio-imagems',CondominiumImageController::class);
    Route::resource('condominio-status',CondominiumStatusController::class);

});

