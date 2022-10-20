<?php

namespace App\Http\Controllers\DetailTransaction;

use App\Http\Controllers\Controller;
use App\Models\ViewTransactionCharge;
use Illuminate\Http\Request;

class DetailTransactionChargeController extends Controller
{
    public function show_transaction_charge_by_id($order_id)
    {
        try {
            $detailtransactioncharge = ViewTransactionCharge::where('order_id', $order_id)->first();
            if ($detailtransactioncharge != null) {
                return response()->json(array('status' => true, 'Detail transaction charge berhasil di tampilkan' => $detailtransactioncharge), 200);
            } else {
                return response()->json(array('message' => 'Detail transaction charge gagal di tampilkan'), 400);
            }
        } catch (\Exception $e) {
            return response()->json(array('message' => 'Gagal menampilkan detail transaction charge'), 500);
        }
    }
}
