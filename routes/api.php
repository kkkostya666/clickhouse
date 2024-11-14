<?php

use App\Http\Controllers\AdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\CampaignController;

Route::prefix('campaigns')->group(function () {
    Route::get('/', [CampaignController::class, 'index']);
    Route::post('/create', [CampaignController::class, 'store']);
    Route::delete('delete/{campaign}', [CampaignController::class, 'destroy']);
    Route::put('update/status/{campaign}', [CampaignController::class, 'updateStatus']);
});

Route::prefix('ads')->group(function () {
    Route::get('/', [AdController::class, 'index']);
    Route::post('/create', [AdController::class, 'store']);
    Route::delete('delete/{ad}', [AdController::class, 'destroy']);
    Route::patch('update/text/{ad}', [AdController::class, 'updateText']);
    Route::patch('update/budget/{ad}', [AdController::class, 'updateBudget']);
});
