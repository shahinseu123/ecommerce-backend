<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Http\Request;

class AllordersController extends Controller
{
    public function index()
    {
        $order = Order::with('OrderProducts')->get();
        return view("backend.orders.all_orders.index", ['orders' => $order]);
    }
}
