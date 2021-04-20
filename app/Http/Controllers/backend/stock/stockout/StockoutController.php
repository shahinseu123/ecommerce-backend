<?php

namespace App\Http\Controllers\backend\stock\stockout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockoutController extends Controller
{
    public function index(){
        return view("backend.stock.stock_out.index");
    }
}
