<?php

namespace App\Http\Controllers\backend\stock\alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    public function index()
    {
        $product_array = DB::table('products')
            ->join('product_data', 'products.id', '=', 'product_data.product_id')
            ->where('products.stock_alert_quantity', '>', 'product_data.stock')
            ->get();
        return view("backend.stock.alert.index", ['product_array' => $product_array]);
    }
}
