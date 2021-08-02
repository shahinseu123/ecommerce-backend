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
            if ($request->products) {
                $orderLatest = Order::orderBy('created_at', 'desc')->first();
                foreach ($request->products as $item) {
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $orderLatest->id;
                    $orderProduct->product_id =  $item['id'];
                    if ($request->quantity) {
                        foreach ($request->quantity as $q) {
                            if ($q['id'] == $item['id']) {
                                $orderProduct->quantity = $q['qnty'];
                            }
                        }
                    }
                    if ($request->variation) {
                        foreach ($request->variation as $v) {
                            if ($v[0] == $item['id']) {
                                $orderProduct->product_data_id = $v[1];
                            }
                        }
                    } else {
                        $orderProduct->product_data_id = $item['productdata'][0]['id'];
                    }

                    $orderProduct->save();
                }
            }
        }
    }
}
