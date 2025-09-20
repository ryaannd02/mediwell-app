<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\ChatController;

// --- Auth masyarakat ---
Route::get('/login', [AuthController::class, 'showMasyarakatLogin'])->name('login');
Route::post('/login', [AuthController::class, 'masyarakatLogin']);
Route::get('/register', [AuthController::class, 'showMasyarakatRegister']);
Route::post('/register', [AuthController::class, 'masyarakatRegister']);

// --- Auth dokter ---
Route::get('/login/dokter', [AuthController::class, 'showDokterLogin']);
Route::post('/login/dokter', [AuthController::class, 'dokterLogin']);

// --- Auth toko ---
Route::get('/login/toko', [AuthController::class, 'showTokoLogin'])->name('toko.login');
Route::post('/login/toko', [AuthController::class, 'tokoLogin']);

// --- Protected routes ---

// Masyarakat
Route::middleware(['auth','role:masyarakat'])->group(function() {
    Route::get('/masyarakat/dashboard', fn() => view('masyarakat.dashboard'))
        ->name('masyarakat.dashboard');

    // daftar dokter & chat
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/masyarakat/chat/{doctor}', [ChatController::class, 'room'])
        ->name('masyarakat.chat.room');
    Route::post('/masyarakat/chat/{doctor}', [ChatController::class, 'send'])
        ->name('masyarakat.chat.send');

    // katalog produk masyarakat
    Route::get('/masyarakat/products', [MasyarakatController::class, 'products'])
        ->name('masyarakat.products');

    Route::get('/masyarakat/order/{product}', [MasyarakatController::class, 'orderSuccess'])
        ->name('masyarakat.order.success');

    Route::post('/masyarakat/order/{product}', [MasyarakatController::class, 'order'])
        ->name('masyarakat.order');
});

// Dokter
Route::middleware(['auth','role:dokter'])->group(function() {
    Route::get('/dokter/dashboard', [DoctorController::class, 'dashboard'])
        ->name('dokter.dashboard');

    // dokter buka percakapan dengan masyarakat
    Route::get('/dokter/chat/{conversation}', [ChatController::class, 'doctorRoom'])
        ->name('dokter.chat.room');
    Route::post('/dokter/chat/{conversation}', [ChatController::class, 'doctorSend'])
        ->name('dokter.chat.send');
});

// Toko
Route::middleware(['auth','role:toko'])->group(function() {
    Route::get('/toko/dashboard', [TokoController::class, 'dashboard'])
        ->name('toko.dashboard');

    Route::resource('/toko/products', ProductController::class)->names([
        'index'   => 'toko.products.index',
        'create'  => 'toko.products.create',
        'store'   => 'toko.products.store',
        'show'    => 'toko.products.show',
        'edit'    => 'toko.products.edit',
        'update'  => 'toko.products.update',
        'destroy' => 'toko.products.destroy',
    ]);
});

// --- Root redirect ke login masyarakat ---
Route::get('/', fn() => redirect()->route('login'));

// --- Logout ---
Route::post('/logout', function () {
    $role = auth()->user()->role ?? null;

    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return match($role) {
        'toko'       => redirect()->route('toko.login'),
        'dokter'     => redirect('/login/dokter'),
        'masyarakat' => redirect()->route('login'),
        default      => redirect()->route('login'),
    };
})->name('logout');