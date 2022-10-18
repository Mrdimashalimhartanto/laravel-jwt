<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailTransactionCharge;
use App\Http\Controllers\DetailViewTransaction;
use App\Http\Controllers\DetailViewTransactionController;
use App\Http\Controllers\Logs;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionListController;
use App\Http\Controllers\TransactionListLog;
use App\Http\Controllers\TrlistController;
use App\Http\Controllers\ViewTransaction;
use App\Http\Controllers\ViewTransactionChargeController;
use App\Http\Controllers\ViewTransactionController;
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



// API REGISTER & LOGIN
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

    // API ALL TRANSACTION
    Route::get('logs', [LogsController::class, 'get_all_logs']);
    Route::get('v_get_list_trans_charge', [ViewTransactionChargeController::class, 'get_all_view_transaction']);
    Route::get('detail_transaction/{order_id}', [ViewTransactionChargeController::class, 'detail_transaction']);
    Route::get('get_all_transaction_list', [TransactionListController::class, 'get_all_transaction_list']);
    Route::get('list-trans', [ViewTransactionChargeController::class, 'get_trans_all']);

    // VIEW TRANSACTION
    Route::get('get_detail_view_transaction', [ViewTransaction::class, 'get_detail_view_transaction']);
    Route::get('tr_list_log', [TransactionListLog::class, 'tr_list_logs']);

});