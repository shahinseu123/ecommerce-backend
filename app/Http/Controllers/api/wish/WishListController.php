<?php

namespace App\Http\Controllers\api\wish;

use App\Http\Controllers\Controller;
use App\Models\wish\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function wish($id)
    {
        $mywish = WishList::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $id)->first();
        if ($mywish !== null) {
            return ["err" => "This product is already in your favourate list"];
        } else {
            $wish = new WishList();
            $wish->product_id = $id;
            $wish->user_id = Auth::user()->id;
            $wish->count_wish = 1;
            $wish->save();
            return ["msg" => "Product is added to your favourate list"];
        }
    }
    public function get_wish()
    {
        return WishList::where('user_id', '=', auth()->user()->id)->with('Product', 'Product.Productdata')->get();
    }
}
