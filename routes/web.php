<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UmkmController as UserUmkmController;
use App\Http\Controllers\Admin\AspirationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Register 2 Langkah
Route::get('/register-step-1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
Route::post('/register-step-1', [RegisterStepController::class, 'processStep1']);

Route::get('/register-step-2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step-2', [RegisterStepController::class, 'processStep2']);

// Verifikasi Email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru telah dikirim ke email Anda!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Dashboard hanya untuk user yang sudah verifikasi
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// User Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/umkm/edit', [UserUmkmController::class, 'edit'])->name('user.umkm.edit');
    Route::put('/umkm/update', [UserUmkmController::class, 'update'])->name('user.umkm.update');
    Route::get('/umkm/{id}', [UserUmkmController::class, 'show'])->name('user.umkm.show');


    Route::resource('products', \App\Http\Controllers\User\ProductController::class);
    Route::resource('aspirations', \App\Http\Controllers\User\AspirationController::class)
        ->only(['index', 'create', 'store', 'show']);
});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // UMKM Management
        Route::get('/umkm', [\App\Http\Controllers\Admin\UmkmController::class, 'index'])->name('umkm.index');
        Route::get('/umkm/create', [\App\Http\Controllers\Admin\UmkmController::class, 'create'])->name('umkm.create');

        // Route untuk UMKM yang belum diverifikasi
        Route::get('/umkm/unverified', [\App\Http\Controllers\Admin\UmkmController::class, 'unverified'])->name('umkm.unverified');
        Route::put('/umkm/{id}/verify', [\App\Http\Controllers\Admin\UmkmController::class, 'verify'])->name('umkm.verify');

        Route::get('/umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'show'])->name('umkm.show');
        Route::post('/umkm', [\App\Http\Controllers\Admin\UmkmController::class, 'store'])->name('umkm.store');
        Route::get('/umkm/{id}/edit', [\App\Http\Controllers\Admin\UmkmController::class, 'edit'])->name('umkm.edit');
        Route::put('/umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'update'])->name('umkm.update');
        Route::delete('/umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'destroy'])->name('umkm.destroy');

        // Aspirasi
        Route::get('aspirations', [AspirationController::class, 'index'])->name('aspirations.index');
        Route::get('aspirations/{id}', [AspirationController::class, 'show'])->name('aspirations.show');
        Route::post('aspirations/{id}/respond', [AspirationController::class, 'respond'])->name('aspirations.respond');
    });
});

// Default auth routes (login, register, etc)
require __DIR__ . '/auth.php';
