<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\TransactionController;
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

Route::prefix('transactions')
->group(function() {
    Route::post('import', [TransactionController::class, 'import'])->name('transactions.import');
});

// resource controllers
Route::apiResource('transactions', TransactionController::class);
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('summaries', SummaryController::class);