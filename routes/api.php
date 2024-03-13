<?php

use App\Http\Controllers\BandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('bands', [BandController::class, 'getAll']);
Route::post('bands/store', [BandController::class, 'store']);
Route::get('bands/gender/{gender}', [BandController::class, 'getBandsByGender']);
Route::get('bands/{id}', [BandController::class, 'getById']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
