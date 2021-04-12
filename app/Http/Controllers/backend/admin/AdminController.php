<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $admin = User::where('role', '=', 'admin')->get();
        return view("backend.admins.index")->with("admin", $admin);
    }

    public function add_admins(){
        return view("backend.admins.add_admins");
    }

    public function delete_admins($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with("message", "Admin deleted successfully");
    }

    public function edit_admins($id){
        $admin = User::findOrFail($id);
        return view("backend.admins.edit_admins")->with("admin", $admin);
    }

    public function create_admins(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:255',
            'street' => 'required',
            'zip' => 'required|integer',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'password' => 'required|confirmed',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->street = $request->street;
        $admin->zip = $request->zip;
        $admin->city = $request->city;
        $admin->state = $request->state;
        $admin->country = $request->country;
        $admin->role = "admin";
        $admin->password = Hash::make($request->password);
        if($request->user_image){
            $admin->user_image = $request->user_image;
        }
        $admin->save();
        return redirect()->route("backend.admin")->with("success", "Admin created successdully");
    }

    public function update_admins(Request $request){
        $admin = User::findOrFail($request->id);
        if($request->name){
            $admin->name = $request->name;
        }
        if($request->email){
            $admin->email = $request->email;
        }
        if($request->phone){
            $admin->phone = $request->phone;
        }
        if($request->street){
            $admin->street = $request->street;
        }
        if($request->zip){
            $admin->zip = $request->zip;
        }
        if($request->city){
            $admin->city = $request->city;
        }
        if($request->state){
            $admin->state = $request->state;
        }
        if($request->country){
            $admin->country = $request->country;
        }
        if($request->user_image){
            $admin->user_image = $request->user_image;
        }
        if($request->password){
            $admin->password = Hash::make($request->user_image);
        }
        $admin->save();
        return redirect()->route("backend.admin")->with("success", "Admin updated successfully");
    }
}
