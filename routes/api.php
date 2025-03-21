<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\HabitacionController;
use App\Http\Controllers\Api\MunicipioController;
use App\Http\Controllers\Api\AcomodacionTipoController;

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

Route::apiResource('hoteles', HotelController::class);
Route::put('/hoteles/{hotel_id}/habitaciones', [HabitacionController::class, 'update']);



Route::put('/habitaciones', [HabitacionController::class, 'update']);
Route::get('/habitaciones/hotel/{hotel_id}', [HabitacionController::class, 'getByHotel']);

Route::get('/municipios', [MunicipioController::class, 'index']);

Route::get('/acomodaciones-tipos', [AcomodacionTipoController::class, 'getAcomodacionesTipos']);
