<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebinfoController extends Controller
{
    public function update_webinfo(Request $request)
    {
        return $request->all();
    }
}
