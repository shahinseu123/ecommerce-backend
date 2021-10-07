<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\customers\Customer;
use App\Models\order\Order;
use App\Models\product\Product;
use App\Models\product\ProductData;
use App\Models\User;
use Illuminate\Http\Request;

class NewOrderController extends Controller
{
    public function index()
    {
        $customer = User::where('role', '=', 'user')->orderBy('name', 'asc')->get();
        $product = Product::where('status', '=', true)->orderBy('title', 'asc')->get();
        return view("backend.orders.create_new.index")->with(['customer' => $customer, 'product' => $product]);
    }

    public function get_product(Request $request)
    {
        $product = Product::where('id', '=', $request->prod)->with('Productdata')->first();
        $attr = Attribute::all();
        return ["product" => $product, "attribute" => $attr];
    }

    public function order_delivered_status($id)
    {
        $order = Order::where('id', $id)->with('OrderProducts')->first();
        $product_data_id = [];
        $quantuty = [];
        $i = 0;
        foreach ($order->OrderProducts as $op) {
            $product_data_id[$i] = $op->product_data_id;
            $quantuty[$i] = $op->quantity;
            $i++;
        }
        $j = 0;
        foreach ($product_data_id as $id) {
            $product_data = ProductData::findOrFail($id);
            $product_data->stock = $product_data->stock - $quantuty[$j];
            $product_data->save();
            $j++;
        }
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back()->with('success', 'Status changed');
    }
    public function order_returned_status($id)
    {
        $order = Order::findOrFail($id);
        $product_data_id = [];
        $quantuty = [];
        $i = 0;
        foreach ($order->OrderProducts as $op) {
            $product_data_id[$i] = $op->product_data_id;
            $quantuty[$i] = $op->quantity;
            $i++;
        }
        $j = 0;
        foreach ($product_data_id as $id) {
            $product_data = ProductData::findOrFail($id);
            $product_data->stock = $product_data->stock + $quantuty[$j];
            $product_data->save();
            $j++;
        }
        $order->status = 'Returned';
        $order->save();
        return redirect()->back()->with('success', 'Status changed');
    }
    public function order_processing_status($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Processing';
        $order->save();
        return redirect()->back()->with('success', 'Status changed');
    }

    public function payment_due($id)
    {
        $order = Order::findOrFail($id);
        $order->payment_status = 'Due';
        $order->save();
        return redirect()->back()->with('success', 'Payment status changed');
    }
    public function payment_paid($id)
    {
        $order = Order::findOrFail($id);
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back()->with('success', 'Payment status changed');
    }

    public function payment_pending($id)
    {
        $order = Order::findOrFail($id);
        $order->payment_status = 'Pending';
        $order->save();
        return redirect()->back()->with('success', 'Payment status changed');
    }

    public function show_order($id)
    {
        $order = Order::where('id', $id)->with('OrderProducts')->first();
        // return $order;
        return view('backend.orders.all_orders.show', ['order' => $order]);
    }
}
