<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Http\Request;

class ReturnedController extends Controller
{
    public function index()
    {
        $order = Order::where('status', 'Returned')->with('OrderProducts')->get();
        return view("backend.orders.returned.index", ['orders' => $order]);
    }
}
