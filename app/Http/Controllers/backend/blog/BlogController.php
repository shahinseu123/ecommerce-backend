<?php

namespace App\Http\Controllers\backend\blog;

use App\Http\Controllers\Controller;
use App\Models\blog\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderBy('id', 'desc')->get();
        return view('backend.blog.index', ['blog' => $blog]);
    }

    public function add_blog()
    {
        return view('backend.blog.add');
    }

    public function create_blog(Request $request)
    {


        $request->validate([
            'blog_title' => 'required',
            'blog_title_bd' => 'required',
            'blog_description' => 'required',
            'blog_description_bd' => 'required',
            'blog_image' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_tags' => 'required',
        ]);

        Blog::create($request->all());
        return redirect()->route('admin.blog')->with('success', 'Blog created succesfully');
    }

    public function change_status($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->status == 'active') {
            $blog->status = 'inactive';
        } else {
            $blog->status = 'active';
        }
        $blog->save();
        return redirect()->back();
    }

    public function delete_blog($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Blog deleted successfully');
    }

    public function edit_blog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', ['blog' => $blog]);
    }

    public function update_blog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_title_bd' => 'required',
            'blog_description' => 'required',
            'blog_description_bd' => 'required',
            'blog_image' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_tags' => 'required',
        ]);

        $blog = Blog::findOrFail($request->id);
        $blog->update($request->all());
        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully');
    }
}
