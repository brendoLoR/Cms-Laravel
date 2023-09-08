<?php

use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\UploadAssetsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.session')->group(function () {
    Route::get('block/{block}', [BlockController::class, 'edit'])->name('api.block.edit');
    Route::put('block/{block}', [BlockController::class, 'update'])->name('api.block.update');
    Route::post('asset', UploadAssetsController::class)->name('api.asset.store');
});
