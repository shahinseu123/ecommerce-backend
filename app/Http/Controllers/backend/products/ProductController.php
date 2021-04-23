<?php

namespace App\Http\Controllers\backend\products;

use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\brand\Brand;
use App\Models\category\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('backend.products.index');
    }

    public function add_product(){
        $brands = Brand::orderBy('brand_title', 'asc')->get()
                 ->map(function($brand){
                   return [
                              'id' => $brand->id,
                              'brand_title' => $brand->brand_title,
                          ];
                 });

        $categories = Category::orderBy('category_title', 'asc')->where('status', '=', 'active')->get()
                    ->map(function($category){
                         return [
                            'id' => $category->id,
                            'category_title' => $category->category_title,
                         ];
                    });          
        $attributes = Attribute::orderBy('attr_name', 'asc')->get()
                    ->map(function($attributes){
                         return [
                            'id' => $attributes->id,
                            'attr_name' => $attributes->attr_name,
                         ];
                    });          
        return view('backend.products.add_product')->with(['brands' => $brands, 'categories' => $categories, 'attributes' => $attributes ]);
    }

    public function create_product(Request $request){
        return $request->all();
    }
}
