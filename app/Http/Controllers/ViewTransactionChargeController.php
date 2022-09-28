<?php

namespace App\Http\Controllers;

use App\Models\ViewTransactionCharge;
use Illuminate\Http\Request;

class ViewTransactionChargeController extends Controller
{
    public function get_all_view_transaction()
    {
        return response()->json(ViewTransactionCharge::all(), 200);
    }
}
