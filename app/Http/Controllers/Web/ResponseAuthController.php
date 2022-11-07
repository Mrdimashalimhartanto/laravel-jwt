<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseAuthController extends Controller
{
    public function error_login()
    {
        return view('pages.landing.error');
    }
}
