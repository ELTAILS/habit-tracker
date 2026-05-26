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
    //HABITS
    Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habit.create');
    Route::post('dashboard/habits', [HabitController::class, 'store'])->name('habit.store');
    Route::delete('dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy');
});


//Cadastrar

Route::get('/cadastrar', [CadastrarController::class, 'index'])->name('cadastrar');
Route::post('/cadastrar', [CadastrarController::class, 'cadastrar'])->name('auth.cadastrar');
