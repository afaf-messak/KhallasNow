<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcom');
})->name('home');

// ==================== CONTRATS ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/contrats', [ContractController::class, 'index'])->name('contrats.index');
    Route::get('/contrats/create', [ContractController::class, 'create'])->name('contrats.create');
    Route::post('/contrats', [ContractController::class, 'store'])->name('contrats.store');
    Route::get('/contrats/{contrat}', [ContractController::class, 'show'])->name('contrats.show');
    Route::get('/contrats/{contrat}/edit', [ContractController::class, 'edit'])->name('contrats.edit');
    Route::put('/contrats/{contrat}', [ContractController::class, 'update'])->name('contrats.update');
    Route::delete('/contrats/{contrat}', [ContractController::class, 'destroy'])->name('contrats.destroy');
    Route::get('/contrats/{contrat}/optimisation', [ContractController::class, 'optimisation'])->name('contrats.optimisation');
});

// ==================== FACTURES (Liste + Filtres) ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/factures', [InvoiceController::class, 'index'])->name('factures.index');
});

// ==================== PAIEMENTS (Historique) ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.index');
});

// ==================== ADMIN ====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [AdminController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/status', [AdminController::class, 'toggleStatus'])->name('users.status');
});