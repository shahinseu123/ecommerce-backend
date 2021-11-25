<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCode;
use App\Models\User;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                "message" => "Invalid credentials"
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'success',
        ])->withCookie($cookie);
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|String|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = "user";
        $user->password = Hash::make($request->password);
        $user->save();
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                "message" => "Invalid credentials"
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'success',
        ])->withCookie($cookie);
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function user()
    {
        $user = User::where('id', '=', Auth::user()->id)->with('Order', 'Order.OrderProducts.Product', 'Order.OrderProducts.Product.Productdata', 'Cupon')->first();
        return $user;
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function send_code(Request $request)
    {
        $token = rand(1000, 9999);
        $user = User::where('email', '=', $request->email)->first();
        $user->resetToken = $token;
        $user->save();
        Mail::to($request->email)->send(new SendCode($token));
    }

    public function confirm_code(Request $request)
    {
        $user = User::where('resetToken', '=', $request->code)->first();
        if ($user !== null) {
            return ['message' => $user->id];
        } else {
            return ['message' => 'failed'];
        }
    }

    public function newPassword(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return ['message' => 'success'];
    }
}
