<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_all_product()
    {
        $product = Product::where('status', '=', 1)->orderBy('id', 'desc')->with('Productgallery', 'Productdata', 'Category', 'Brand', 'VariableAttribute', 'Wish')->get();
        return $product;
    }

    public function getSortedProducts()
    {
        return Product::orderBy('count_sold', 'desc')->with('Productgallery', 'Productdata', 'Category', 'Brand', 'VariableAttribute')->take(20)->get();
    }
}
