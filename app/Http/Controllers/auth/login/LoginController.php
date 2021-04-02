<?php

namespace App\Http\Controllers\auth\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_page(){
        return view('frontend.auth.admin.login');
    }

    public function login_action(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);
    }
}
