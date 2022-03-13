<?php

use App\Http\Controllers\api\MarcaController;
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

Route::get('marcas/all', [MarcaController::class, 'index']);
Route::post('marcas/new', [MarcaController::class, 'store']);
Route::get('marcas/{marca}', [MarcaController::class, 'show']);
Route::put('marcas/update/{marca}', [MarcaController::class, 'update']);
