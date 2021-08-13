<?php

namespace App\Http\Controllers\backend\customer;

use App\Http\Controllers\Controller;
use App\Models\customers\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::where('role', 'user')->orderBy('id', 'desc')->get();
        return view('backend.customers.index')->with('customer', $customer);
    }

    public function add_customer()
    {
        return view('backend.customers.add_customer');
    }

    public function create_customer(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers',
            'street' => 'required|unique:customers|max:255',
            'zip' => 'required',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
        ]);
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->zip = $request->zip;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->user_image = $request->customer_image;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->route('backend.customer')->with('success', 'Customer created successfully');
    }

    public function change_status($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->status === "active") {
            $customer->status = "inactive";
            $customer->save();
            return redirect()->back();
        } else {
            $customer->status = "active";
            $customer->save();
            return redirect()->back();
        }
    }

    public function edit_customer($id)
    {
        $customer = User::findOrFail($id);
        return view('backend.customers.edit_customer')->with('customer', $customer);
    }

    public function delete_customer($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Customer deleted successfully');
    }

    public function update_customer(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->zip = $request->zip;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->customer_image = $request->customer_image;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->route('backend.customer')->with('success', 'Customer updated successfully');
    }
}
