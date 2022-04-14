<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $today = Carbon::today();
        $month = $today->format('m');
        $today_order = Order::whereDay('created_at', '=', Carbon::today())->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $today_revenue = 0;
        $today_unit_price = 0;
        $today_discount = 0;
        $today_profit = 0;
        foreach ($today_order as $dItem) {
            $today_discount = $today_discount + $dItem->discount_amount;
            foreach ($dItem->OrderProducts as $dItem_2) {
                $today_revenue = $today_revenue + $dItem_2->sale_price * $dItem_2->quantity;
                $today_unit_price = $today_unit_price + $dItem_2->unit_price * $dItem_2->quantity;
                $today_profit = $today_revenue - $today_unit_price - $dItem->discount_amount;
            }
        }

        // dd($today_profit);
        $monthly_order = Order::whereMonth('created_at', '=', $month)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();

        $monthly_revenue = 0;
        $monthly_unit_price = 0;
        $monthly_discount = 0;
        $monthly_profit = 0;
        foreach ($monthly_order as $dItem) {
            $monthly_discount = $monthly_discount + $dItem->discount_amount;
            foreach ($dItem->OrderProducts as $dItem_2) {
                $monthly_revenue = $monthly_revenue + $dItem_2->sale_price * $dItem_2->quantity;
                $monthly_unit_price = $monthly_unit_price + $dItem_2->unit_price * $dItem_2->quantity;
                $monthly_profit = $monthly_revenue - $monthly_unit_price - $dItem->discount_amount;
            }
        }

        $yearly_order = Order::whereYear('created_at', '=', Carbon::now()->year)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();

        $yearly_revenue = 0;
        $yearly_unit_price = 0;
        $yearly_discount = 0;
        $yearly_profit = 0;
        foreach ($yearly_order as $dItem) {
            $yearly_discount = $yearly_discount + $dItem->discount_amount;
            foreach ($dItem->OrderProducts as $dItem_2) {
                $yearly_revenue = $yearly_revenue + $dItem_2->sale_price * $dItem_2->quantity;
                $yearly_unit_price = $yearly_unit_price + $dItem_2->unit_price * $dItem_2->quantity;
                $yearly_profit = $yearly_revenue - $yearly_unit_price - $dItem->discount_amount;
            }
        }

        return view('backend.accounts.profit.index', ['today_discount' => $today_discount, 'monthly_discount' => $monthly_discount, 'yearly_discount' => $yearly_discount, 'today_order' => $today_order, 'monthly_order' => $monthly_order, 'yearly_order' => $yearly_order, 'today_revenue' => $today_revenue, 'today_unit_price' => $today_unit_price, 'today_profit' => $today_profit, 'monthly_revenue' => $monthly_revenue, 'monthly_unit_price' => $monthly_unit_price, 'monthly_profit' => $monthly_profit, 'yearly_revenue' => $yearly_revenue, 'yearly_unit_price' => $yearly_unit_price, 'yearly_profit' => $yearly_profit]);
    }
}
