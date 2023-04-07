<?php

use App\Http\Controllers\MercadoPagoController;
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

Route::post('/process_payment', [MercadoPagoController::class, 'process_payment']);
Route::post('/process_payment_boleto', [MercadoPagoController::class, 'process_payment_boleto']);