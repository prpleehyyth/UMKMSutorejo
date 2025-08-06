<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// --- Controller Imports ---
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\DashboardController;
// Guest Controllers
use App\Http\Controllers\Guest\UmkmController as GuestUmkmController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;
// User Controllers
use App\Http\Controllers\User\UmkmController as UserUmkmController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\AspirationController as UserAspirationController;
// Admin Controllers
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UmkmController as AdminUmkmController;
use App\Http\Controllers\Admin\AspirationController as AdminAspirationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Guest Routes ---
// [FIX] Menghapus route '/' duplikat, hanya menggunakan landing page sebagai root.
Route::get('/', [GuestUmkmController::class, 'landing'])->name('guest.landing');

Route::prefix('umkm')->name('guest.umkm.')->group(function () {
    Route::get('/', [GuestUmkmController::class, 'index'])->name('index');
    Route::get('/show/{id}', [GuestUmkmController::class, 'show'])->name('show');
});

Route::get('/produk/{id}', [GuestProductController::class, 'show'])->name('guest.products.show');


// --- Registration & Verification Routes ---
Route::get('/register/step1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterStepController::class, 'processStep1']);
Route::get('/register/step2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [RegisterStepController::class, 'processStep2']);

Route::get('/email/verify', fn() => view('auth.verify-email'))->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru telah dikirim ke email Anda!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// --- Authenticated User Routes ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/umkm/edit', [UserUmkmController::class, 'edit'])->name('user.umkm.edit');
    Route::put('/umkm/update', [UserUmkmController::class, 'update'])->name('user.umkm.update');
    Route::get('/umkm/{id}', [UserUmkmController::class, 'show'])->name('user.umkm.show');

    Route::resource('products', UserProductController::class);
    Route::resource('aspirations', UserAspirationController::class)->only(['index', 'create', 'store', 'show']);
});


// --- Admin Routes ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // [REKOMENDASI] Manajemen UMKM dirapikan menggunakan Route::resource
        Route::resource('umkm', AdminUmkmController::class);
        Route::get('/umkm-unverified', [AdminUmkmController::class, 'unverified'])->name('umkm.unverified');
        Route::put('/umkm/{umkm}/verify', [AdminUmkmController::class, 'verify'])->name('umkm.verify');

        // [PEMBARUAN INTI] Manajemen Aspirasi disesuaikan dengan Controller baru
        Route::get('aspirations', [AdminAspirationController::class, 'index'])->name('aspirations.index');
        Route::get('aspirations/{aspiration}', [AdminAspirationController::class, 'show'])->name('aspirations.show');
        Route::get('aspirations/{aspiration}/respond', [AdminAspirationController::class, 'respond'])->name('aspirations.respond');
        // Menggunakan method 'storeResponse' untuk proses POST
        Route::post('aspirations/{aspiration}/respond', [AdminAspirationController::class, 'storeResponse'])->name('aspirations.storeResponse');
        // [BARU] Menambahkan route untuk proses hapus
        Route::delete('aspirations/{aspiration}', [AdminAspirationController::class, 'destroy'])->name('aspirations.destroy');
    });
});


// Default auth routes
require __DIR__ . '/auth.php';
