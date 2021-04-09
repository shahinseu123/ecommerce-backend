<?php

namespace App\Http\Controllers\backend\menu;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use App\Models\menu\Menu;
use App\Models\menu\MenuItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function index(Request $request){
        $menu = Menu::all();
        if($request->menu){
            $menu_items = MenuItem::where('menu_id', $request->menu)->orderBy('position')->where('parent_id', null)->get();
            $selected_menu = Menu::find($request->menu);
        }else{
            $menu_items = [];
            $selected_menu = null;
        }
       
        $recent_category = Category::where('created_at', Carbon::today())->get();
        $all_category = Category::all();
        $category_all = Category::orderby('id', 'desc')->get();
        return view("backend.frontend.menu.index")->with(["menu" => $menu,'category_all' => $category_all, 'recent_category' => $recent_category,'menu_items' => $menu_items, "selected_menu" => $selected_menu, ""]);
    }

    public function add_menu_item(Request $request){
        // return $request->all();
        if(!$request->menu_item){
            Alert::warning('Warning', 'No menu items selected');
            return redirect()->back()->with("message", "Menu items not selected");
        }
        if(!$request->menu_name){
            Alert::warning('Warning', 'Menu not selected');
            return redirect()->back()->with("message", "Menu is not selected");
        }
        $menu = Menu::find($request->menu_name);
        $last_position = MenuItem::orderBy('position', 'desc')->first();
        if($last_position){
            $i = $last_position->position+1;
        }else{
            $i = 0;
        }
        foreach($request->menu_item as $item){
            $menu_item = new MenuItem();
            $menu_item->item_name = $item;
            $menu_item->menu_id = $menu->id;
            $menu_item->position = $i++;
            $menu_item->save();
        }
        Alert::success('Success', 'Menu item added successfully');
        return redirect()->back();
    }

    public function backend_add_link_action(Request $request){
        // return $request->all();
        // $menu = Menu::find($request->menu_name);
        $last_position = MenuItem::orderBy('position', 'desc')->first();
        if($last_position){
            $i = $last_position->position+1;
        }else{
            $i = 0;
        }

        if(!$request->menu_name){
            Alert::warning('Warning', 'Menu not selected');
            return redirect()->back()->with("message", "Menu not selected");
        }
        $menu_item = new MenuItem();
        $menu_item->menu_id = $request->menu_name;
        $menu_item->item_name = $request->menu_item;
        $menu_item->link = $request->link;
        $menu_item->position = $i++;
        $menu_item->save();
        Alert::success('Success', 'Menu item added successfully');
        return redirect()->back()->with("success", "Menu item added successfully");
    }
    public function create(Request $request){
        // return $request->all();
        if($request->menu_wild_id){
            $menu = Menu::where('menu_name', '=', $request->menu_wild_id)->first();
            $menu->menu_name = $request->menu_name;
            $menu->save();
            Alert::success('Updated', 'Menu updated successfully');
            return redirect()->back();
        }else{
            $request->validate([
                'menu_name' => 'required|string'
            ]);
            $menu = Menu::create($request->all());
            Alert::success('Success', 'Menu created successfully');
            return redirect()->back()->with("success", "Menu created successfully");
        }
    }

    public function delete(Request $request){
            // return $request->all();
            if($request->menu_name){
                $menu = Menu::where('id', '=', $request->menu_name)->first();
                $menu->delete();
                Alert::error('Deleted', 'Menu deleted successfully');
                return redirect()->back();
            }else{
                Alert::error('Opps', 'Menu not selected');
                return redirect()->back();
            }
    }

    public function delete_menu(Request $request){
        if($request->menu_name){
            $menu = Menu::where('id', '=', $request->menu_name)->first();
            $menu->delete();
            Alert::error('Deleted', 'Menu deleted successfully');
            return redirect()->back()->with("message", "Menu deleted successfully");
        }else{
            Alert::error('Opps', 'Menu not selected');
            return redirect()->back()->with("message", "Menu not selected");
        }
    }

    public function update_position(Request $request){
        $items = json_decode($request->json);
        // dd($items);

        foreach($items as $key => $item){
            $item_q = MenuItem::find($item->id);
            $item_q->position = $key;
            $item_q->parent_id = null;
            $item_q->save();

            // dd($item->children);
            if(isset($item->children)){
                foreach($item->children as $key => $children_1){
                    $item_2_q = MenuItem::find($children_1->id);
                    $item_2_q->position = $key;
                    $item_2_q->parent_id = $item_q->id;
                    $item_2_q->save();

                    if(isset($children_1->children)){
                        foreach($children_1->children as $key => $children_2){
                            $item_3_q = MenuItem::find($children_2->id);
                            $item_3_q->position = $key;
                            $item_3_q->parent_id = $item_2_q->id;
                            $item_3_q->save();

                            if(isset($children_2->children)){
                                foreach($children_2->children as $key => $children_3){
                                    $item_4_q = MenuItem::find($children_3->id);
                                    $item_4_q->position = $key;
                                    $item_4_q->parent_id = $item_3_q->id;
                                    $item_4_q->save();

                                    if(isset($children_3->children)){
                                        foreach($children_3->children as $key => $children_4){
                                            $item_5_q = MenuItem::find($children_4->id);
                                            $item_5_q->position = $key;
                                            $item_5_q->parent_id = $item_4_q->id;
                                            $item_5_q->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            // dd($item_q);
        }

        Alert::success('Success', 'Menu updated successfully');
        return redirect()->back();

    }

    public function delete_menu_item(Request $request){
        $item = MenuItem::findOrFail($request->item_id)->delete();
    }
}
