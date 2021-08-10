<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Http\Request;

class DeliveredController extends Controller
{
    public function index()
    {
        $order = Order::where('status', 'Delivered')->with('OrderProducts')->get();
        return view('backend.orders.delivered.index', ['orders' => $order]);
    }
}
