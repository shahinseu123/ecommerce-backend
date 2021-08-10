<?php

namespace App\Http\Controllers\backend\stock\adjustment;

use App\Http\Controllers\Controller;
use App\Models\adjustment\Adjustment;
use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
   public function index()
   {
      $adjust = Adjustment::orderBy('id', 'desc')->get();
      return view("backend.stock.adjustment.index", ['adjust' =>  $adjust]);
   }

   public function add_adjustment()
   {
      $product = Product::orderBy('id', 'desc')->with('Productdata')->get();
      return view("backend.stock.adjustment.add_adjustment", ['product' => $product]);
   }

   public function create_adjustment(Request $request)
   {
      $adj = new Adjustment();
      $adj->product_id = $request->id;
      $adj->prod_title = $request->prod_title;
      $adj->variation = $request->variation;
      $adj->op_type = $request->op_type;
      if ($request->op_type == 'addition') {
         $product_data = ProductData::findOrFail($request->variation);
         $product_data->stock += $request->qnty;
         $product_data->save();
      } else {
         $product_data = ProductData::findOrFail($request->variation);
         $product_data->stock -= $request->qnty;
         $product_data->save();
      }
      $adj->unit_cost = $request->unit_cost;
      $adj->qnty = $request->qnty;
      $adj->subtotal = $request->subtotal;
      $adj->grand_total = $request->grand_total;
      $adj->note = $request->note;
      $adj->save();
      return redirect()->back()->with('success', 'Adjustment created successfully');
   }

   public function delete_adjustment($id)
   {
      Adjustment::findOrFail($id)->delete();
      return redirect()->back()->with('message', 'Adjustment deleted successfully');
   }
}
