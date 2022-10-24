<?php

namespace App\Http\Controllers;

use App\Models\Transactionlog;
use App\Models\ViewCmsTransactionLogs;
use Illuminate\Http\Request;

class v_cms_trans_log extends Controller
{
    public function get_all_cms_trans_logs()
    {
        return response()->json(ViewCmsTransactionLogs::all(), 200);
    }
}
