<?php

namespace App\Http\Controllers\DetailTransaction;

use Illuminate\Http\Request;
use App\Models\Transactionview;
use App\Http\Controllers\Controller;

class DetailViewTransactionController extends Controller
{
    public function detail_view_transaction($orderId)
    {
        try {
            $detailviewtransaction = Transactionview::where('order_id', $orderId)->first();
            if ($detailviewtransaction != null) {
                return response()->json(array('status' => true, 'Detail view transaction berhasil di tampilkan' => $detailviewtransaction), 200);
            } else {
                return response()->json(array('message' => 'Detail view transaction gagal ditampilkan'), 400);
            }
        } catch (\Exception $e) {
            return response()->json(array('message' => 'Gagal menampilkan view transaction'), 500);
        }
    }
}
