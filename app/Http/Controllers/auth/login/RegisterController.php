<?php

namespace App\Http\Controllers\auth\login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function register_page(){
       return view('frontend.auth.admin.register');
    }

    public function register_action(Request $request){
        // return $request->all();
        $request->validate([
            'name' => 'required|String|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
             if(Auth::user()->role === 'admin'){
                 toast('User created successfully','success');
                 return redirect()->route('backend.dashboard');
             }else{
                 return "User panel";
             }
        }else{
             return redirect()->back();
        }
        
    }
}
