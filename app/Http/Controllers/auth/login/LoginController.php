<?php

namespace App\Http\Controllers\auth\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login_page(){
        return view('frontend.auth.admin.login');
    }

    public function login_action(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           if(Auth::user()->role === 'admin'){
               return redirect()->route('backend.dashboard');
           }else{
               return redirect()->route('user.profile');
           }
        }else{
            Alert::error('Login failed', 'Please check email and password');
            return redirect()->back();
        }
    }

    public function signout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
