<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== HOME ====================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ==================== CLIENT AUTH ====================
Route::prefix('client')->group(function () {
    Route::get('/login', [AuthController::class, 'showClientLogin'])->name('client.login');
    Route::post('/login', [AuthController::class, 'loginClient'])->name('client.login.submit');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('client.dashboard');
    Route::post('/logout', [AuthController::class, 'logoutClient'])->middleware('auth')->name('client.logout');
});

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

// ==================== FACTURES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/factures', [InvoiceController::class, 'index'])->name('factures.index');
});

// ==================== PAIEMENTS ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.index');
});

// ==================== ADMIN AUTH ====================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    Route::middleware(['auth:admin', 'admin.session'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::get('/users/create', [AdminController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [AdminController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::match(['post', 'patch'], '/users/{user}/status', [AdminController::class, 'toggleStatus'])->name('admin.users.status');
        Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
        Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
        Route::get('/users/{user}', [AdminController::class, 'show'])->name('admin.users.show');
        Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments.index');
        Route::get('/payments/export/csv', [AdminController::class, 'exportPaymentsCsv'])->name('admin.payments.export.csv');
        Route::get('/payments/export/pdf', [AdminController::class, 'exportPaymentsPdf'])->name('admin.payments.export.pdf');
        Route::get('/invoices', [AdminController::class, 'invoices'])->name('admin.invoices.index');
        Route::post('/invoices', [AdminController::class, 'storeInvoice'])->name('admin.invoices.store');
        Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics.index');
        Route::get('/help', [AdminController::class, 'help'])->name('admin.help');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    });
});

// Redirect /admin vers dashboard
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->name('admin.root');