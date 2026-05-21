<?php

use App\Http\Controllers\CadastrarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');


Route::middleware('auth')->group(function() {
    //Dashboard
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});


//Cadastrar

Route::get('/cadastrar', [CadastrarController::class, 'index'])->name('cadastrar');
Route::post('/cadastrar', [CadastrarController::class, 'cadastrar'])->name('auth.cadastrar');
