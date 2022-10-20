<?php

namespace App\Http\Controllers;

use App\Models\Transactionlog;
use Illuminate\Http\Request;

class v_cms_trans_log extends Controller
{
    public function get_all_trans_logs()
    {
        return response()->json(Transactionlog::all(), 200);
    }
}
