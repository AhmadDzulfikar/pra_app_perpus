<?php

use App\Http\Controllers\API\admin\BukuApiController;
use App\Http\Controllers\API\admin\IdentitasApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\admin\KategoriApiController;
use App\Http\Controllers\API\admin\PenerbitApiController;
use App\Http\Controllers\API\user\PeminjamanApiController;
use App\Http\Controllers\API\user\PengembalianApiController;

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

// Auth::routes();
// User
Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    //Peminjaman
    Route::prefix('peminjaman')->controller(PeminjamanApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
    });

    //Pengembalian
    Route::prefix('pengembalian')->controller(PengembalianApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
    });
});

// Admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    //Kategori
    Route::prefix('kategori')->controller(KategoriApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Penerbit
    Route::prefix('penerbit')->controller(PenerbitApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Buku
    Route::prefix('buku')->controller(BukuApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}', 'destroy');
    });

    //Identitas
    Route::prefix('identitas')->controller(IdentitasApiController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}', 'destroy');
    });
});



//Pesan
Route::get('pesan', [App\Http\Controllers\API\PesanApiController::class, 'index']);
Route::post('pesan', [App\Http\Controllers\API\PesanApiController::class, 'store']);
Route::post('pesan/update/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'update']);
Route::delete('pesan/delete/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'destroy']);
