<?php

use App\Http\Controllers\CadastrarController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [SiteController::class, 'index'])->name('index');

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');


Route::middleware('auth')->group(function() {
    //Dashboard
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    Route::resource('/dashboard/habits', HabitController::class)->except(['show'])->names([
        'index' => 'habit.index',
        'create' => 'habit.create',
        'store' => 'habit.store',
        'edit' => 'habit.edit',
        'update' => 'habit.update',
        'destroy' => 'habit.destroy',
    ]);

    Route::get('/dashboard/habits/configurar', [HabitController::class, 'configurar'])->name('habit.configurar');
    Route::post('/dashboard/habits/{habit}/toggle', [HabitController::class, 'toggle'])->name('habit.toggle');

});


//Cadastrar
Route::get('/cadastrar', [CadastrarController::class, 'index'])->name('cadastrar');

Route::post('/cadastrar', [CadastrarController::class, 'cadastrar'])->name('auth.cadastrar');
