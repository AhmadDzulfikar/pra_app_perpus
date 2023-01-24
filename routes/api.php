<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Pesan
Route::get('pesan', [App\Http\Controllers\API\PesanApiController::class, 'index']);
Route::post('pesan', [App\Http\Controllers\API\PesanApiController::class, 'store']);
Route::post('pesan/update/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'update']);
Route::delete('pesan/delete/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'destroy']);
