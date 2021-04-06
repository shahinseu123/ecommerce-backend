<?php

namespace App\Http\Controllers\backend\brand;

use App\Http\Controllers\Controller;
use App\Models\brand\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brand = Brand::all();
        return view('backend.brands.index')->with('brand', $brand);
    }
    public function add_brand(){
        return view('backend.brands.add_brand');
    } 
    public function create_brand(Request $request){
        $request->validate([
            'brand_title' => 'required|max:255',
            'meta_title' => 'max:255',
        ]);

        Brand::create($request->all());
        return redirect()->route('backend.brand')->with('success', 'Brand created successfully');
    }

    public function change_status($id){
        $brand = Brand::findOrFail($id);
        if($brand->status === 'active'){
          $brand->status = "inactive";
          $brand->save();
          return redirect()->back();
        }else{
          $brand->status = "active";  
          $brand->save();
          return redirect()->back();
        }

    }

    public function delete_brand($id){
        Brand::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Brand deleted successfully');
    }

    public function edit_brand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brands.edit_brand')->with('brand', $brand);
    }

    public function update_brand(Request $request){
        Brand::findOrFail($request->id)->update($request->all());
        return redirect()->route('backend.brand')->with('success', 'Brand created successfully');
    }
}
