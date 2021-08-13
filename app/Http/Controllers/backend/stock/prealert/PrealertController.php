<?php

namespace App\Http\Controllers\backend\stock\prealert;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrealertController extends Controller
{
    public function index()
    {
        $product_array = DB::table('products')
            ->join('product_data', 'products.id', '=', 'product_data.product_id')
            ->where('products.stock_pre_alert_quantity', '>', 'product_data.stock')
            ->select('products.*')
            ->get();
        return view("backend.stock.pre_alert.index", ['product_array' => $product_array]);
    }
}
