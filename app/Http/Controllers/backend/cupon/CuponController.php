<?php

namespace App\Http\Controllers\backend\cupon;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use App\Models\cupon\Cupon;
use App\Models\product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuponController extends Controller
{
    public function index()
    {

        $cupon = Cupon::all();

        return view('backend.cupon.index', ['cupon' => $cupon]);
    }

    public function add_cupon()
    {
        $product = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('backend.cupon.add', ['products' => $product, 'categories' => $categories]);
    }

    public function edit_cupon($id)
    {
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $categories = Category::all();
        $cupon  = Cupon::where('id', '=', $id)->with('Product', 'Category')->first();
        return view('backend.cupon.edit', ['cupon' => $cupon, 'products' => $products, 'categories' => $categories]);
    }

    public function create_cupon(Request $request)
    {
        $request->validate([
            'cupon_name' => 'required',
            'discount_type' => 'required',
            'discount_amount' => 'required',
        ]);
        $cupon = new Cupon();
        $cupon->cupon_name = $request->cupon_name;
        $cupon->discount_type = $request->discount_type;
        $cupon->status = 'active';
        $cupon->discount_amount = $request->discount_amount;
        if ($request->cupon_des) {
            $cupon->cupon_des = $request->cupon_des;
        }
        if ($request->free_shiping) {
            $cupon->free_shiping = $request->free_shiping;
        }
        if ($request->expiry_date) {
            $cupon->expiry_date = $request->expiry_date;
        }
        if ($request->min_amount) {
            $cupon->min_amount = $request->min_amount;
        }
        if ($request->max_amount) {
            $cupon->max_amount = $request->max_amount;
        }
        if ($request->individual_use_only) {
            $cupon->individual_use_only = $request->individual_use_only;
        }
        if ($request->exclude_sale_item) {
            $cupon->exclude_sale_item = $request->exclude_sale_item;
        }
        if ($request->cupon_usage_limit) {
            $cupon->cupon_usage_limit = $request->cupon_usage_limit;
        }
        if ($request->usage_limit_per_user) {
            $cupon->usage_limit_per_user = $request->usage_limit_per_user;
        }
        $cupon->save();
        $last_cupon = Cupon::orderBy('created_at', 'desc')->first();
        if ($request->include_product) {
            foreach ($request->include_product as $item) {
                DB::table('cupon_product')->insert(['product_id' => $item, 'cupon_id' => $last_cupon->id, 'type' => 'include']);
            }
        }
        if ($request->product_exclude) {
            foreach ($request->product_exclude as $item) {
                DB::table('cupon_product_exclude')->insert(['product_id' => $item, 'cupon_id' => $last_cupon->id, 'type' => 'exclude']);
            }
        }
        if ($request->select_category) {
            foreach ($request->select_category as $item) {
                DB::table('cupon_category')->insert(['category_id' => $item, 'cupon_id' => $last_cupon->id]);
            }
        }
        return redirect()->back()->with('success', 'Cupon added successfully');
    }

    public function delete_cupon($id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->delete();
        DB::table('cupon_category')->where('cupon_id', $id)->delete();
        DB::table('cupon_product')->where('cupon_id', $id)->delete();
        DB::table('cupon_product_exclude')->where('cupon_id', $id)->delete();
        return redirect()->back()->with('message', 'Coupon deleted successfully');
    }

    public function update_cupon(Request $request)
    {
        $request->validate([
            'cupon_name' => 'required',
            'discount_type' => 'required',
            'discount_amount' => 'required',
        ]);
        $cupon = Cupon::findOrFail($request->id);
        $cupon->cupon_name = $request->cupon_name;
        $cupon->discount_type = $request->discount_type;

        $cupon->discount_amount = $request->discount_amount;
        if ($request->cupon_des) {
            $cupon->cupon_des = $request->cupon_des;
        }
        if ($request->free_shiping) {
            $cupon->free_shiping = $request->free_shiping;
        }
        if ($request->expiry_date) {
            $cupon->expiry_date = $request->expiry_date;
        }
        if ($request->min_amount) {
            $cupon->min_amount = $request->min_amount;
        }
        if ($request->max_amount) {
            $cupon->max_amount = $request->max_amount;
        }
        if ($request->individual_use_only) {
            $cupon->individual_use_only = $request->individual_use_only;
        }
        if ($request->exclude_sale_item) {
            $cupon->exclude_sale_item = $request->exclude_sale_item;
        }
        if ($request->cupon_usage_limit) {
            $cupon->cupon_usage_limit = $request->cupon_usage_limit;
        }
        if ($request->usage_limit_per_user) {
            $cupon->usage_limit_per_user = $request->usage_limit_per_user;
        }
        $cupon->save();
        $last_cupon = Cupon::orderBy('created_at', 'desc')->first();
        if ($request->include_product) {
            DB::table('cupon_product')->where('cupon_id', '=', $request->id)->delete();
            foreach ($request->include_product as $item) {
                DB::table('cupon_product')->insert(['product_id' => $item, 'cupon_id' => $last_cupon->id, 'type' => 'include']);
            }
        }
        if ($request->product_exclude) {
            DB::table('cupon_product_exclude')->where('cupon_id', '=', $request->id)->delete();
            foreach ($request->product_exclude as $item) {
                DB::table('cupon_product_exclude')->insert(['product_id' => $item, 'cupon_id' => $last_cupon->id, 'type' => 'exclude']);
            }
        }
        if ($request->select_category) {
            DB::table('cupon_category')->where('cupon_id', '=', $request->id)->delete();
            foreach ($request->select_category as $item) {
                DB::table('cupon_category')->insert(['category_id' => $item, 'cupon_id' => $last_cupon->id]);
            }
        }
        return redirect()->back()->with('success', 'Coupon updated successfully');
    }

    public function active_cupon($id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->status = 'active';
        $cupon->save();
        return redirect()->back()->with('success', 'Coupon status is active now');
    }
    public function inactive_cupon($id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->status = 'inactive';
        $cupon->save();
        return redirect()->back()->with('success', 'Coupon status is inactive now');
    }
}
