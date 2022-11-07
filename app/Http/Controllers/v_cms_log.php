<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\view_cms_logs;
use App\Models\ViewCmsLogs;
use Illuminate\Http\Request;

class v_cms_log extends Controller
{
    public function get_all_logs()
    {
        return response()->json(ViewCmsLogs::all(), 200);
    }
}
