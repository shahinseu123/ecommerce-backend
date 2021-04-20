<?php

namespace App\Http\Controllers\backend\stock\adjustment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
    public function index(){
       return view("backend.stock.adjustment.index");
    }

    public function add_adjustment(){
       return view("backend.stock.adjustment.add_adjustment");
    }
}
