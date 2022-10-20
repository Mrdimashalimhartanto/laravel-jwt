<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DetailTransaction\DetailTransactionChargeController;
use App\Http\Controllers\DetailTransaction\DetailTransactionListLogsController;
use App\Http\Controllers\DetailTransaction\DetailViewCmsLogsController;
use App\Http\Controllers\DetailTransaction\DetailViewTransactionController;
use App\Http\Controllers\DetailTransaction\ViewCmsLogsController;
use App\Http\Controllers\DetailTransaction\ViewTransactionController;

;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\TransactionListController;
use App\Http\Controllers\TransactionListLog;
use App\Http\Controllers\v_cms_log;
use App\Http\Controllers\ViewTransaction;
use App\Http\Controllers\ViewTransactionChargeController;
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

    /////////// API LOGIN , REGISTER & LOGOUT
    Route::post('register', [AuthUserController::class, 'register']);
    Route::post('login', [AuthUserController::class, 'login']);
    Route::get('logout', [AuthUserController::class, 'logout']);
    Route::post('refresh', [AuthUserController::class, 'refresh']);
    Route::get('get_user_by_token', [AuthUserController::class, 'get_user_by_token']);
    ///////////


    /////////// API TRANSACTION
    Route::get('transaction_list', [TransactionListController::class, 'get_all_transaction_list']);
    Route::get('all_list_transaction', [ViewTransactionChargeController::class, 'get_trans_all']);
    Route::get('get_all_tr_list_logs', [TransactionListLog::class,'get_all_tr_list_logs']);
    Route::get('get_detail_view_transaction', [ViewTransaction::class, 'get_detail_view_transaction']);
    ///////////


    // VIEW API TRANSACTION
    Route::get('view_cms_logs', [v_cms_log::class, 'get_all_logs']);
    Route::get('view_get_list_trans_charge', [ViewTransactionChargeController::class, 'get_all_view_transaction']);


    // DETAIL TRANSACTION BY ID
    Route::get('show_transaction_charge_by_id/{order_id}', [DetailTransactionChargeController::class,'show_transaction_charge_by_id']);
    Route::get('detail_view_transaction/{order_id}', [DetailViewTransactionController::class, 'detail_view_transaction']);
    Route::get('show_detai_transaction_list_logs/{order_id}', [DetailTransactionListLogsController::class, 'show_detai_transaction_logs']);
    // Route::get('detail_view_cms_logs/{order_id}', [ViewCmsLogsController::class, 'detail_view_cms_logs']);
});