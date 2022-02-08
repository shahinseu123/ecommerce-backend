<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpanseController extends Controller
{
    public function index()
    {
        return view('backend.accounts.expanses.index');
    }
}
