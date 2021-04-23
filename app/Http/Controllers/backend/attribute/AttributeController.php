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

    public function edit_attribute_item(Request $request){
        $item = AttributeItem::findOrFail($request->data_id);
        return $item;
    }

    public function update_attribute_item(Request $request){
        $item = AttributeItem::findOrFail($request->id);
        $item->update($request->all());
        return redirect()->back()->with('success', 'Attribute item updated successfully');
    }

    public function delete_attribute_item(Request $request){
        AttributeItem::findOrFail($request->data_id)->delete();
        return ["message", "Attribute item deleted successfully"];
    }

    public function edit_attribute(Request $request){
        $attr = Attribute::findOrFail($request->data_id);
        return $attr;
       
    }

    public function update_attribute(Request $request){
        Attribute::findOrFail($request->id)->update($request->all());
        return redirect()->back()->with('success', 'Attribute updated successfully');
    }

    public function delete_attribute($id){
        $item = Attribute::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('message', 'Attribute deleted successfully');
    }

    public function get_single_item(Request $request){
        if($request->attr_value){
               $attr = Attribute::where('attr_name', '=', $request->attr_value)->with('AttributeItem')->first();
            return $attr;
        }
    }

    public function get_attr_item(Request $request){
        $attr_item = [];
        $j = 0;
        if($request->arr){
            foreach($request->arr as $i){
                $attr_item[$j] = AttributeItem::where('id', '=', $i)->first();
                $j++;
            }
            return $attr_item;
        }else{
            return "data not found";
        }
    }
}
