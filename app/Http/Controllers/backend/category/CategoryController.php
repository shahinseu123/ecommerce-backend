<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.categories.index');
    }

    public function add_category(){
        $category = Category::all();
        return view('backend.categories.add_category')->with('category', $category);
    }

    public function create_category(Request $request){
        $request->validate([
            'category_title' => 'required',
        ]);
        Category::create($request->all());
        Alert::success('Success', 'Category created successfully');
        return redirect()->route('backend.category');
    }
}
