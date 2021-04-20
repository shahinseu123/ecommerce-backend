<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveredController extends Controller
{
    public function index(){
        return view('backend.orders.delivered.index');
    }
}
