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
            $data->orderBy($request->sortby, (($request->sortdesc == true) ? 'asc' : 'desc'));
        }

        // $data = $this->filterBy($data, $request);

        $result = $data->skip($offset)->take($perPage)->get();

        $count = ViewTransactionCharge::where('broker_id', 1)->get()->count();

        return ResponseAci::SuccessList($count, $result, 'Success');
    }

    // public function show_transaction_charge_by_id($order_id)
    // {
    //     try {
    //         $detailtransactioncharge = ViewTransactionCharge::where('order_id', $order_id)->first();
    //         if ($detailtransactioncharge != null) {
    //             return response()->json(array('status' => true, 'data' => $detailtransactioncharge), 200);
    //         } else {
    //             return response()->json(array('message' => 'Detail transaction charge gagal di tampilkan'), 400);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(array('message' => 'Gagal menampilkan detail transaction charge'), 500);
    //     }
    // }
}
