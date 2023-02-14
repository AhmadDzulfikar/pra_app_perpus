<?php

use App\Http\Controllers\API\admin\AdminApiController;
use App\Http\Controllers\API\admin\AnggotaApiController;
use App\Http\Controllers\API\admin\BukuApiController;
use App\Http\Controllers\API\admin\IdentitasApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\admin\KategoriApiController;
use App\Http\Controllers\API\admin\PeminjamanApiController as AdminPeminjamanApiController;
use App\Http\Controllers\API\admin\PenerbitApiController;
use App\Http\Controllers\API\admin\PesanApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\user\PeminjamanApiController;
use App\Http\Controllers\API\user\PengembalianApiController;
use App\Http\Controllers\API\user\PesanApiController as UserPesanApiController;
use App\Http\Controllers\API\user\ProfileApiController;
use App\Http\Controllers\User\PesanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);


// Auth::routes();
// User
Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    //LogOut
    Route::post('logout', [AuthController::class, 'logout']);

    //Peminjaman
    Route::prefix('peminjaman')->controller(PeminjamanApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
    });

    //Pengembalian
    Route::prefix('pengembalian')->controller(PengembalianApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update/{id}', 'update');
    });

    //Profile
    Route::prefix('profile')->controller(ProfileApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update/{id}', 'update');
    });

    //Pesan
    Route::prefix('userpesan')->controller(UserPesanApiController::class)->group(function () {
        Route::get('/', 'indexMasuk');
        Route::post('/update/{id}', 'ubah_status');

        Route::get('/terkirim', 'indexTerkirim');
        Route::post('/store', 'storePesan');
    });
});

// Admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    //LogOut
    Route::post('logout', [AuthController::class, 'logout']);

    //Kategori
    Route::prefix('kategori')->controller(KategoriApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Penerbit
    Route::prefix('penerbit')->controller(PenerbitApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Buku
    Route::prefix('buku')->controller(BukuApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Identitas
    Route::prefix('identitas')->controller(IdentitasApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    //Pesan
    Route::prefix('pesan')->controller(PesanApiController::class)->group(function () {
        Route::get('/', 'indexMasuk');
        Route::post('/update/{id}', 'ubah_status');

        Route::get('/terkirim', 'pesanTerkirim');
        Route::post('/store', 'storePesan');
    });
    
    //Pemberitahuan

    //Anggota
    Route::prefix('anggota')->controller(AnggotaApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Admin
    Route::prefix('admin')->controller(AdminApiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });

    Route::prefix('peminjaman')->controller(AdminPeminjamanApiController::class)->group(function () {
        Route::get('/', 'index');
    });
});



//Pesan
// Route::get('pesan', [App\Http\Controllers\API\PesanApiController::class, 'index']);
// Route::post('pesan', [App\Http\Controllers\API\PesanApiController::class, 'store']);
// Route::post('pesan/update/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'update']);
// Route::delete('pesan/delete/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'destroy']);
