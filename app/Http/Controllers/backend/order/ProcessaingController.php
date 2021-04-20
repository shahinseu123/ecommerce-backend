<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessaingController extends Controller
{
    public function index(){
        return view("backend.orders.processing.index");
    }
}
