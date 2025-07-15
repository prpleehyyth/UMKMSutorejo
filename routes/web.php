<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepController;

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

require __DIR__ . '/auth.php';
