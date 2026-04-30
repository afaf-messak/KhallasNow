<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


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
Route::get('/', function () {
    return view('welcom');
});

Route::prefix('client')->group(function () {
    Route::get('/login', [AuthController::class, 'showClientLogin'])->name('client.login');
    Route::post('/login', [AuthController::class, 'loginClient'])->name('client.login.submit');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('client.dashboard');
    Route::post('/logout', [AuthController::class, 'logoutClient'])->middleware('auth')->name('client.logout');
});

// Note: admin routes are defined in the `Route::prefix('admin')` group above.
// Keep a root admin entry if you want `/admin` to show the dashboard.
Route::get('/admin', function () {
    return redirect()->route('admin.users.index');
})->name('admin.root');
