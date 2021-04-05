<?php

namespace App\Http\Controllers\backend\attribute;

use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\attribute\AttributeItem;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $attr = Attribute::orderBy('id', 'desc')->with('AttributeItem')->get();
        return view('backend.attributes.index')->with('attr', $attr);
    }

    public function add_attribute(Request $request){
        $request->validate([
            'attr_name' => 'required',
        ]);
        Attribute::create($request->all());
        return redirect()->back()->with('success', 'Attribute created successfully');
    }

    public function add_attribute_item(Request $request){
       $request->validate([
           'item_name' => 'required',
       ]);
       AttributeItem::create($request->all());
       return redirect()->back()->with('success', 'Attribute item created successfully');
    }
}
