<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
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

Route::get('accounts', [AccountController::class, 'index']);
Route::get('account/{accountId}/transactions/', [AccountController::class, 'show']);

Route::post('account', [AccountController::class, 'store']);
Route::post('account/{accountId}/transaction', [TransactionController::class, 'store']);
