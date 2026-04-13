<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcom');
});


Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/{user}/status', [AdminController::class, 'toggleStatus'])->name('admin.users.status');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
Route::get('/admin/users/{user}', [AdminController::class, 'show'])->name('admin.users.show');
