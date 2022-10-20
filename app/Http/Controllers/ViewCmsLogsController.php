<?php

namespace App\Http\Controllers;

use App\Models\ViewCmsLogs;
use Illuminate\Http\Request;

class ViewCmsLogsController extends Controller
{
    public function view_cms_logs()
    {
        return response()->json(ViewCmsLogs::all(), 200);
    }
}
