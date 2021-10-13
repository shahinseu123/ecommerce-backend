<?php

namespace App\Http\Controllers\api\coupon;

use App\Http\Controllers\Controller;
use App\Models\cupon\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    //

    public function get_coupons()
    {
        $coupon = Cupon::where('status', '=', 'active')->orderBy('created_at', 'desc')->first();
        return $coupon;
    }

    public function coupon_used(Request $request)
    {
        $prevCupon = DB::table('copun_user')->where('user_id', '=', $request->userId)->where('cupon_id', '=', $request->couponId)->count();
        $coupon = Cupon::where('id', '=', $request->couponId)->first();


        if ($prevCupon < $coupon->usage_limit_per_user) {
            DB::table('copun_user')->insert(['user_id' => $request->userId, 'cupon_id' => $request->couponId, 'cupon_used' => $request->promoUsed]);
            return ['msg' => 'Coupon used successfully'];
        } else {
            return ['msg' => 'Coupon usage limit exceeded'];
        }
    }
}
