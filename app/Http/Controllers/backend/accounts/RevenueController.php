<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        // dd(Carbon::);
        $now = Carbon::now();
        // echo $now->year;
        // echo $now->month;
        // echo $now->weekOfYear;
        $today = Carbon::today();
        $month = $today->format('m');
        $today_order = Order::whereDay('created_at', '=', Carbon::today())->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $monthly_order = Order::whereMonth('created_at', '=', $month)->where('status', 'Delivered')->with('OrderProducts')->get();
        $yearly_order = Order::whereYear('created_at', '=', Carbon::now()->year)->where('status', 'Delivered')->with('OrderProducts')->get();
        // $order = Order::where('status', 'Delivered')->with('OrderProducts')->get();
        // return $today_order;
        return view('backend.accounts.revenue.index', ['dailay_order' => $today_order, 'monthly_order' => $monthly_order, 'yearly_order' => $yearly_order]);
    }
}
