<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_all_category()
    {
        return Category::orderBy('category_title', 'desc')->with('Child')->get();
    }
}
