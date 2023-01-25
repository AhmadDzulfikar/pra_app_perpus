<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\User\PengembalianController;
use App\Http\Controllers\User\PesanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

//User
Route::middleware(['auth', 'role:user'])->prefix('/user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    //Pesan
    Route::get('/pesan-terkirim', [PesanController::class, 'pesan_terkirim'])->name('user.pesan_terkirim');
    Route::post('/kirim-pesan', [PesanController::class, 'kirim_pesan'])->name('user.kirim_pesan');
    
    Route::get('/pesan-masuk', [PesanController::class, 'pesan_masuk'])->name('user.pesan_masuk');
    Route::post('/ubah-status', [PesanController::class, 'ubah_status'])->name('user.ubah_status');

    //Peminjaman
    Route::get('riwayat-peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('user.riwayat_peminjaman');

    Route::get('form-peminjaman', [PeminjamanController::class, 'peminjamanForm'])->name('user.form_peminjaman');
    Route::post('form-dari-dashboard', [PeminjamanController::class, 'formDasboard'])->name('user.form_peminjaman_dashboard');
    Route::post('submit-form', [PeminjamanController::class, 'submitForm'])->name('user.submit_peminjaman');

    //Pengembalian
    Route::get('riwayat-pengembalian', [PengembalianController::class, 'riwayatPengembalian'])->name('user.riwayat_pengembalian');

    Route::get('form-pengembalian', [PengembalianController::class, 'form_pengembalian'])->name('user.form_pengembalian');
    Route::post('submit-pengembalian', [PengembalianController::class, 'submit_pengembalian'])->name('user.submit_pengembalian');
});
