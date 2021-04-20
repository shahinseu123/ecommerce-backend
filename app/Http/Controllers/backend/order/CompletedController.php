<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    public function index(){
        return view("backend.orders.completed.index");
    }
}
