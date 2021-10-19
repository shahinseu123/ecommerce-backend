<?php

namespace App\Http\Controllers\backend\parallax;

use App\Http\Controllers\Controller;
use App\Models\parallax\Parallax;
use Illuminate\Http\Request;

class ParallaxController extends Controller
{
    public function index()
    {
        $parallax = Parallax::all();

        return view('backend.parallax.index', ['parallax' => $parallax]);
    }

    public function add_parallax()
    {
        return view('backend.parallax.add');
    }

    public function create_parallax(Request $request)
    {
        Parallax::create($request->all());
        return redirect()->route('backend.parallax')->with('success', 'Parallax created successfully');
    }

    public function delete_parallax($id)
    {
        Parallax::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Parallax deleted successfully');
    }

    public function edit_parallax($id)
    {
        $parallax = Parallax::findOrFail($id);
        return view('backend.parallax.edit', ['parallax' => $parallax]);
    }

    public function update_parallax(Request $request)
    {
        Parallax::findOrFail($request->id)->update($request->all());
        return redirect()->route('backend.parallax')->with('success', 'Parallax updated successfully');
    }
}
