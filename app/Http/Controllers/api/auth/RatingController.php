<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\rating\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function create_review(Request $request)
    {
        $rate = new Rate();
        $rate->user_id = auth()->user()->id;
        $rate->product_id = $request->product_id;
        $rate->review_text = $request->review;
        $rate->rating = $request->rate;
        $rate->save();
    }

    public function get_review($id)
    {
        return Rate::where('product_id', '=', $id)->orderBy('created_at', 'desc')->with("User")->get();
    }
}
