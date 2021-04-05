<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::orderBy('id', 'desc')->with('Child')->get();
        return view('backend.categories.index')->with('category', $category);
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
        return redirect()->route('backend.category')->with('success', 'Category created successfully');
    }

    public function update_status($id){
        $category = Category::findOrFail($id);
        if($category->status === "active"){
            $category->status = "inactive";
            $category->save();
            return redirect()->back();
        }else{
            $category->status = "active"; 
            $category->save();
            return redirect()->back();
        }
    }

    public function delete_category($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }

    public function edit_category($id){
        $cat = Category::findOrFail($id);
        $category = Category::all();
        return view('backend.categories.edit_category')->with(['cat' => $cat, 'category' => $category]);
    }

    public function update_category(Request $request){
        $cate = Category::findOrFail($request->id);
        $cate->update($request->all());
        return redirect()->route('backend.category')->with('success', 'Category updated successfully');
    }
}
