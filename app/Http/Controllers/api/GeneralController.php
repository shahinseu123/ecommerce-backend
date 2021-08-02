<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\brand\Brand;
use App\Models\slider\Slider;
use Illuminate\Http\Request;

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
}
