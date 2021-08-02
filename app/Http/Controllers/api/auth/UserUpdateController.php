<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUpdateController extends Controller
{
    public function update_userInfo(Request $request)
    {
        $user = User::where('id', '=', auth()->user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->street) {
            $user->street = $request->street;
        }
        if ($request->city) {
            $user->city = $request->city;
        }
        if ($request->state) {
            $user->state = $request->state;
        }
        if ($request->zip) {
            $user->zip = $request->zip;
        }
        if ($request->country) {
            $user->country = $request->country;
        }
        $user->save();
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            // 'password_new' => 'required|confirmed',
        ]);

        if (Hash::check($request->password_old, auth()->user()->password)) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->password_new)]);
        } else {
            return ['message', 'Old password is wrong'];
        }
    }
}
