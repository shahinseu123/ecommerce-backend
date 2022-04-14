<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $today = Carbon::today();
        $month = $today->format('m');
        $today_order = Order::whereDay('created_at', '=', Carbon::today())->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $today_delivery_charge = 0;
        // dd($today_order);
        foreach ($today_order as $dItem) {
            $today_delivery_charge = $today_delivery_charge + $dItem->shipping_charge;
        }
        // dd($today_vat);
        $month_order = Order::whereMonth('created_at', '=', $month)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        // dd($month_order);
        $monthly_delivery_charge = 0;
        foreach ($month_order as $dItem) {

            $monthly_delivery_charge = $monthly_delivery_charge + $dItem->shipping_charge;
        }

        $yearly_order = Order::whereYear('created_at', '=', Carbon::now()->year)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $year_delivery_charge = 0;
        foreach ($yearly_order as $dItem) {

            $year_delivery_charge = $year_delivery_charge + $dItem->shipping_charge;
        }

        return view('backend.accounts.delivery_charge.index', ['today_delivery_charge' => $today_delivery_charge, 'monthly_delivery_charge' => $monthly_delivery_charge, 'year_delivery_charge' => $year_delivery_charge]);
    }
}
