<?php

use App\Http\Controllers\api\MarcaController;
use App\Http\Controllers\api\PropietarioController;
use App\Http\Controllers\api\TipoVehiculoController;
use App\Http\Controllers\api\VehiculoController;
use App\Models\Propietario;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('marcas/all', [MarcaController::class, 'index']);
Route::post('marcas/new', [MarcaController::class, 'store']);
Route::get('marcas/{marca}', [MarcaController::class, 'show']);
Route::put('marcas/update/{marca}', [MarcaController::class, 'update']);
Route::get('marca/activo', [MarcaController::class, 'marcasActiva']);

Route::get('tipo_vehiculos/all', [TipoVehiculoController::class, 'index']);
Route::post('tipo_vehiculos/new', [TipoVehiculoController::class, 'store']);
Route::get('tipo_vehiculos/{tipo_vehiculo}', [TipoVehiculoController::class, 'show']);
Route::put('tipo_vehiculos/update/{tipo_vehiculo}', [TipoVehiculoController::class, 'update']);
Route::get('tipo_vehiculo/activo', [TipoVehiculoController::class, 'tipoVehiculoActivo']);

Route::get('propietarios/all', [PropietarioController::class, 'index']);
Route::post('propietarios/new', [PropietarioController::class, 'store']);
Route::get('propietarios/{propietario}', [PropietarioController::class, 'show']);
Route::put('propietarios/update/{propietario}', [PropietarioController::class, 'update']);

Route::get('vehiculos/all', [VehiculoController::class, 'index']);
Route::post('vehiculos/new', [VehiculoController::class, 'store']);
Route::get('vehiculos/{vehiculo}', [VehiculoController::class, 'show']);
Route::get('vehiculo/cant_marca', [VehiculoController::class, 'getCantidadporMarca']);
Route::get('vehiculo/buscar', [VehiculoController::class, 'buscar']);
Route::put('vehiculos/update/{vehiculo}', [VehiculoController::class, 'update']);
