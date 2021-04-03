<?php

namespace App\Http\Controllers\backend\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('backend.products.index');
    }

    public function add_product(){
        return view('backend.products.add_product');
    }
}
