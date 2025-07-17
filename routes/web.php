<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-step-1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
Route::post('/register-step-1', [RegisterStepController::class, 'processStep1']);

Route::get('/register-step-2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step-2', [RegisterStepController::class, 'processStep2']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//ADMINN 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        Route::get('/umkm', [\App\Http\Controllers\Admin\UmkmController::class, 'index'])->name('umkm.index');

        Route::get('umkm/create', [\App\Http\Controllers\Admin\UmkmController::class, 'create'])->name('umkm.create');


        Route::get('umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'show'])->name('umkm.show');

        Route::post('/umkm', [\App\Http\Controllers\Admin\UmkmController::class, 'store'])->name('umkm.store');

        Route::get('/umkm/{id}/edit', [\App\Http\Controllers\Admin\UmkmController::class, 'edit'])->name('umkm.edit');
        Route::put('/umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'update'])->name('umkm.update');

        Route::delete('/umkm/{id}', [\App\Http\Controllers\Admin\UmkmController::class, 'destroy'])->name('umkm.destroy');
    });
});
require __DIR__ . '/auth.php';
