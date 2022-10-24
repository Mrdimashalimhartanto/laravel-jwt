<?php

namespace App\Http\Controllers\DetailTransaction;

use App\Http\Controllers\Controller;
use App\Models\Transactionlog;
use Illuminate\Http\Request;

class DetailTransactionListLogsController extends Controller
{
    public function show_detail_transaction_logs($order_id)
    {
        try {
            $transactionlogs = Transactionlog::where(
                'order_id',
                $order_id
            )->first();
            if ($transactionlogs != null) {
                return response()->json(
                    [
                        'status' => true,
                        'data' => $transactionlogs,
                    ],
                    200
                );
            } else {
                return response()->json(
                    ['message' => 'Detail transaction logs gagal di tampilkan'],
                    400
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Gagal menampilkan detail transaction'],
                500
            );
        }
    }
}
