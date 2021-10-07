<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_all_product()
    {
        return Product::where('status', '=', 1)->orderBy('id', 'desc')->with('Productgallery', 'Productdata', 'Category', 'Brand', 'VariableAttribute', 'Wish')->get();
    }

    public function getSortedProducts()
    {
        return Product::orderBy('count_sold', 'desc')->with('Productgallery', 'Productdata', 'Category', 'Brand', 'VariableAttribute', 'Wish')->take(30)->get();
    }
}
