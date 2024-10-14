<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionAPIController;
use App\Http\Controllers\Api\UserValidationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('get-transaction', [TransactionAPIController::class, 'index']);
Route::post('get-transaction', [TransactionAPIController::class, 'store']);
Route::get('get-transaction/{id}', [TransactionAPIController::class, 'show']);
Route::put('get-transaction/{id}', [TransactionAPIController::class, 'update']);
Route::delete('get-transaction/{id}', [TransactionAPIController::class, 'destroy']);
Route::get('validate-user/{identifier}', [UserValidationController::class, 'validateUser']);
