<?php

namespace App\Http\Controllers\backend\stock\prealert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrealertController extends Controller
{
    public function index(){
        return view("backend.stock.pre_alert.index");
    }
}
