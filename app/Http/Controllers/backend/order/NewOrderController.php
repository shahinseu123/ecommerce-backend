<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\customers\Customer;
use App\Models\product\Product;
use Illuminate\Http\Request;

class NewOrderController extends Controller
{
    public function index(){
        $customer = Customer::where('status', '=', 'active')->orderBy('name', 'asc')->get();
        $product = Product::where('status', '=', true)->orderBy('title', 'asc')->get();
        return view("backend.orders.create_new.index")->with(['customer'=> $customer, 'product' => $product]);
    }

    public function get_product(Request $request){
        $product = Product::where('id', '=', $request->prod)->with('Productdata')->first();
        $attr = Attribute::all();
        return ["product" => $product, "attribute" => $attr];
    }
}
