<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseAci;
use App\Models\ViewTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ViewTransactionCharge;

class ViewTransactionChargeController extends Controller
{

    public $perPage = 100;


    public function get_all_view_transaction()
    {

        $data = ViewTransactionCharge::where('broker_id', 1)->get();

        $count = ViewTransactionCharge::where('broker_id', 1)->get()->count();

        return ResponseAci::SuccessList($count, $data, 'Success');
    }

    public function get_trans_all(Request $request)
    {

        $perPage = $request->perpage;

        if (!empty($perPage)) {
            $perPage = $this->perPage;
        }

        $page = $request->page;

        
        $offset = 0;

        if (!empty($page)) {
            $offset = ($page -1 ) * $perPage ;
        }

        $data = ViewTransactionCharge::where('broker_id', 1);

        if (!empty($request->sortby)) {
            $data->orderBy($request->sortby, (($request->sortdesc == true) ? 'desc' : 'asc'));
        }

        // $data = $this->filterBy($data, $request);

        $result = $data->skip($offset)->take($perPage)->get();

        $count = ViewTransactionCharge::where('broker_id', 1)->get()->count();

        return ResponseAci::SuccessList($count, $result, 'Success');
    }

    
    // FUNCTION UNTUK MENAMPILKAN DETAIL TRANSACTION 
    public function showdetailtransaction($order_id)
    {
        try {
            $detailOrder = ViewTransaction::where('order_id', $order_id)->first();
            if ($detailOrder != null) {
                return response()->json(array('status' => true, 'Detail order berhasil ditampilkan' => $detailOrder), 200);
            } else {
                return response()->json(array('message' => 'Detail Order gagal ditampilkan'), 400);
            }
        } catch (\Exception $e) {
            return response()->json(array('message' => 'gagal menampilkan detail transaction'), 500);
        }
    }
}
