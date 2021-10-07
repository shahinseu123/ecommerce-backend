<?php

namespace App\Http\Controllers\api\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use App\Models\order\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create_order(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->order_number = time();
        $order->phone = $request->phone;
        $order->user_id = $request->user_id;
        $order->street = $request->street;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->shipping_charge = $request->shipping_charge;
        $order->product_total = $request->product_total;
        if ($request->tax) {
            $order->tax = $request->tax;
            $order->tax_amount = $request->tax_amount;
        }
        if ($request->other_cost) {
            $order->other_cost = $request->other_cost;
            $order->tax_amount = $request->tax_amount;
        }
        if ($request->discount) {
            $order->discount = $request->discount;
            $order->discount_amount = $request->discount_amount;
        }
        if ($request->payment_method) {
            $order->payment_method = $request->payment_method;
            $order->payment_transaction_id = $request->payment_transaction_id;
        }
        if ($request->note) {
            $order->note = $request->note;
            $order->staff_note = $request->staff_note;
        }
        if ($request->reference_no) {
            $order->reference_no = $request->reference_no;
        }
        // $order->save();
        if ($order->save()) {
            $latest_order = Order::latest('id')->first();
            if (count($request->quantity) > 0) {
                foreach ($request->quantity as $qnty) {
                    $order_product = new OrderProduct();
                    $order_product->order_id = $latest_order['id'];
                    $order_product->product_id = $qnty['id'];
                    $order_product->product_data_id = $qnty['product_data_id'];
                    $order_product->title = $qnty['name'];
                    $order_product->quantity = $qnty['qnty'];
                    $order_product->sale_price = $qnty['salePrice'];
                    $order_product->total_price = $qnty['total_price'];
                    $order_product->save();
                }
            }
        }
    }
}
