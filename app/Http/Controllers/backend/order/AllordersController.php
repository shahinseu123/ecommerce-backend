<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class AllordersController extends Controller
{
    public function index()
    {
        $order = Order::with('OrderProducts')->get();
        return view("backend.orders.all_orders.index", ['orders' => $order]);
    }

    public function download_pdf($id)
    {
        $order = Order::where('id', $id)->with('OrderProducts')->first();

        $html = view('backend.orders.pdf', ['order' => $order])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
