<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::get('/users', [UserController::class, 'index']);
    
    //rota para autenticação
    Route::post('login', [AuthController::class, 'login']);          
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    //to acessando todas as outras rotas de uma vez 
    Route::apiResource('invoices', InvoiceController::class);           



});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
