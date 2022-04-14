<?php

namespace App\Http\Controllers\backend\accounts;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VATController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $today = Carbon::today();
        $month = $today->format('m');
        $today_order = Order::whereDay('created_at', '=', Carbon::today())->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $today_vat = 0;
        foreach ($today_order as $dItem) {
            $today_vat = $today_vat + $dItem->tax_amount;
        }
        // dd($today_vat);
        $month_order = Order::whereMonth('created_at', '=', $month)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();

        $month_vat = 0;
        foreach ($month_order as $dItem) {

            $month_vat = $month_vat + $dItem->tax_amount;
        }

        $yearly_order = Order::whereYear('created_at', '=', Carbon::now()->year)->where('status', 'Delivered')->where('payment_status', '=', 'Paid')->with('OrderProducts')->get();
        $year_vat = 0;
        foreach ($yearly_order as $dItem) {

            $year_vat = $year_vat + $dItem->tax_amount;
        }

        return view('backend.accounts.tax.index', ['today_vat' => $today_vat, 'month_vat' => $month_vat, 'year_vat' => $year_vat]);
    }
}
