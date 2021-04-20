<?php

namespace App\Http\Controllers\backend\stock\alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(){
        return view('backend.stock.alert.index');
    }
}
