<?php

namespace App\Http\Controllers\DetailTransaction;

use App\Http\Controllers\Controller;
use App\Models\ViewCmsTransactionLogs;
use Illuminate\Http\Request;

class ViewCmsTransactionLogsByID extends Controller
{
    public function cms_trans_logs_byid($orderId)
    {
        try {
            $transaction_logs_byid = ViewCmsTransactionLogs::where('order_id', $orderId)->first();
            if ($transaction_logs_byid != null) {
                return response()->json(array('status' => true, 'data' => $transaction_logs_byid), 200);
            } else {
                return response()->json(array('message' => 'error'), 400);
            }
        } catch (\Exception $e) {
            return response()->json(array('message' => 'Gagal menampilkan transaction logs'), 500);
        }
    }
}
