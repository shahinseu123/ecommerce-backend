<?php

namespace App\Http\Controllers\backend\pages;

use App\Http\Controllers\Controller;
use App\Models\page\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $page = Page::orderBy("id", "desc")->get();
        return view("backend.frontend.pages.index")->with("page", $page);
    }
    
    public function add_page(){
        return view("backend.frontend.pages.add_page");
    }

    public function create_page(Request $request){
        $request->validate([
            'page_title' => 'required',
        ]);
        Page::create($request->all());
        return redirect()->route('backend.page')->with("success", "Page created successfully");
    }

    public function change_status($id){
        $page = Page::findOrFail($id);
        if($page->status === "active"){
            $page->status = "inactive";
            $page->save();
            return redirect()->back();
        }else{
            $page->status = "active"; 
            $page->save();
            return redirect()->back();
        }
    }

    public function edit_page($id){
        $page = Page::findOrFail($id);
        return view("backend.frontend.pages.edit_page")->with("page", $page);
    }

    public function delete_page($id){
        Page::findOrFail($id)->delete();
        return redirect()->back()->with("message", "Page deleted successfully");
    }

    public function update_page(Request $request){
        Page::findOrFail($request->id)->update($request->all());
        return redirect()->route("backend.page")->with("success", "Page updated successfully");
    }
}
