<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\blog\Blog;
use App\Models\brand\Brand;
use App\Models\cupon\Cupon;
use App\Models\parallax\Parallax;
use App\Models\setting\Setting;
use App\Models\slider\Slider;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function get_slider()
    {
        return Slider::orderBy('id', 'desc')->get();
    }

    public function get_brands()
    {
        return Brand::where('status', '=', 'active')->orderBy('created_at', 'desc')->get();
    }

    public function get_paralax()
    {
        return Parallax::orderBy('parallax_position', 'asc')->get();
    }

    public function get_blog()
    {
        return Blog::orderBy('id', 'desc')->get();
    }

    public function get_web_settings()
    {
        return DB::table('settings')->get();
    }
}
