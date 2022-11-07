<?php

namespace App\Http\Controllers\DetailTransaction;

use App\Models\ViewCmsLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewCmsLogsController extends Controller
{
    public function show_detail_view_transaction_logs($order_id)
    {
        try {
            $detailviewlogs = ViewCmsLogs::where(
                'id',
                $order_id
            )->first();
            if ($detailviewlogs != null) {
                return response()->json(
                    [
                        'status' => true,
                        'data' => $detailviewlogs,
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'message' => 'Data gagal ditampilkan',
                    ],
                    400
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Data tidak ditemukan',
                ],
                500
            );
        }
    }
}
