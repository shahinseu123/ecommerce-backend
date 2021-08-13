<?php

namespace App\Http\Controllers\backend\stock\stockout;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockoutController extends Controller
{
    public function index()
    {
        $product_array = DB::table('products')
            ->join('product_data', 'products.id', '=', 'product_data.product_id')
            ->where('product_data.stock', '=', 0)
            ->select('products.*')
            ->get();
        return view("backend.stock.stock_out.index", ['product_array' => $product_array]);
    }
}
