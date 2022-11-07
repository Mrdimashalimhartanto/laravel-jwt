<?php

namespace App\Http\Controllers\DetailTransaction;

use App\Http\Controllers\Controller;
use App\Models\ViewCmsLogs;
use Illuminate\Http\Request;

class DetailLogsByIDController extends Controller
{
    public function show_detail_logs_by_id($order_id)
    {
        try {
            $detail_logs = ViewCmsLogs::where('order_id', $order_id)->first();
            if ($detail_logs != null) {
                return response()->json([
                    'status' => true,
                    'data' => $detail_logs,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Detail logs by order id gagal ditampilkan'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Gagal menampilkan detail transaction'],
                500
            );
        }
    }
}
