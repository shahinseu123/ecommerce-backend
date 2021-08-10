<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Http\Request;

class ProcessaingController extends Controller
{
    public function index()
    {
        $order = Order::where('status', 'Processing')->with('OrderProducts')->get();
        return view("backend.orders.processing.index", ['orders' => $order]);
    }
}
