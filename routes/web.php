<?php

use App\Http\Controllers\User\DashboardController;
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
    
});
