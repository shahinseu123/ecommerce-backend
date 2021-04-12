<?php

namespace App\Http\Controllers\backend\slider;

use App\Http\Controllers\Controller;
use App\Models\slider\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::all();
        return view('backend.frontend.slider.index')->with("slider", $slider);
    }

    public function create_slider(Request $request){
        $request->validate([
            "slider_text_1" => "required",
            "slider_image" => "required",
        ]);

        Slider::create($request->all());
        return redirect()->back()->with("success", "Slider created successfully");
    }

    public function delete_slider(Request $request){
       Slider::findOrFail($request->item_id)->delete();
    }

    public function edit_slider($id){
        $slider = Slider::findOrFail($id);
        return view("backend.frontend.slider.edit_slider")->with("slider", $slider);
    }

    public function update_slider(Request $request){
        Slider::findOrFail($request->id)->update($request->all());
        return redirect()->route("backend.slider")->with("success", "Slider item updated successfully");
    }
}
