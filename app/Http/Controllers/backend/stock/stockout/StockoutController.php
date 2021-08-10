<?php

namespace App\Http\Controllers\backend\stock\stockout;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Http\Request;

class StockoutController extends Controller
{
    public function index()
    {
        $product_array = [];
        $product_data = ProductData::all();
        $products = Product::all();
        foreach ($product_data as $pd) {
            foreach ($products as $prod) {
                if ($prod->id == $pd->product_id &&  $prod->stock_pre_alert_quantity < $pd->stock) {
                    array_push($product_array, $prod);
                }
            }
        }
        return $product_array;
        return view("backend.stock.stock_out.index");
    }
}
