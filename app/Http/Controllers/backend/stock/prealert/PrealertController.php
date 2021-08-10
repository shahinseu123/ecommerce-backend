<?php

namespace App\Http\Controllers\backend\stock\prealert;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Http\Request;

class PrealertController extends Controller
{
    public function index()
    {
        $product_array = [];
        $product_data = ProductData::all();
        $products = Product::with("Productdata")->get();
        foreach ($products as $prod) {
            if ($prod->type == 'simple') {
                if ($prod->stock_pre_alert_quantity > $prod->productdata[0]->stock) {
                    array_push($product_array, $prod);
                }
            }
        }


        return view("backend.stock.pre_alert.index", ['product_array' => $product_array]);
    }
}
