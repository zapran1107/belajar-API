<?php

use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FanController;
use App\Http\Controllers\Api\KlubController;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout',[AuthController::class, 'logout']);


// Route::get('liga', [LigaController::class, 'index']);
// Route::post('liga', [LigaController::class, 'store']);
// Route::get('liga/{id}', [LigaController::class, 'show']);
// Route::put('liga/{id}', [LigaController::class, 'update']);
// Route::delete('liga/{id}', [LigaController::class, 'destroy']);
Route::resource('liga', LigaController::class)->except(['edit', 'create']);
Route::resource('klub', KlubController::class)->except(['edit', 'create']);
Route::resource('pemain', PemainController::class)->except(['edit', 'create']);
Route::resource('fan', FanController::class)->except(['edit', 'create']);
});
//auth route

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);