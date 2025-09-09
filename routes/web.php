<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Public
Route::get('/verify/{uuid}', [VerificationController::class, 'verify'])->name('verify');

Route::get('/scanner', function () {
    return view('scanner');
})->name('scanner');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::patch('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('employees/{id}/qrcode', [QRCodeController::class, 'show'])->name('employees.qrcode');
    Route::get('employees/{employee}/qrcode/download', [QRCodeController::class, 'downloadQr'])->name('employees.qr.download');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
