<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_all_category()
    {
        return Category::where('parent_category', null)->orderBy('category_title', 'desc')->with('Child', 'Child.Child', 'Child.Child.Child')->get();
    }
}
