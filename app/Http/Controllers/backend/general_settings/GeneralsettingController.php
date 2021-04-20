<?php

namespace App\Http\Controllers\backend\general_settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralsettingController extends Controller
{
    public function index(){
        return view('backend.frontend.general_settings.index');
    }

    public function g_settings_update(Request $request){
        $request->validate([
            'website_title' => 'required|max:255',
            'website_slogan' => 'required|max:255',
            'website_email' => 'required|max:255',
            'website_tel' => 'required|max:255',
            'website_copyright' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'zip' => 'required|max:255',
            'street' => 'required|max:255',
        ]);

        $where = [];
        $where['group'] = 'general';

        $where['name'] = 'website_title';
        $insert['value'] = $request->website_title;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'website_slogan';
        $insert['value'] = $request->website_slogan;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'website_email';
        $insert['value'] = $request->website_email;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'website_tel';
        $insert['value'] = $request->website_tel;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'website_copyright';
        $insert['value'] = $request->website_copyright;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'city';
        $insert['value'] = $request->city;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'state';
        $insert['value'] = $request->state;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'country';
        $insert['value'] = $request->country;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'zip';
        $insert['value'] = $request->zip;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'street';
        $insert['value'] = $request->street;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'logo';
        $insert['value'] = $request->logo;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'favicon';
        $insert['value'] = $request->favicon;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'og_image';
        $insert['value'] = $request->og_image;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'tax';
        $insert['value'] = $request->tax;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'tax_type';
        $insert['value'] = $request->tax_type;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'currency';
        $insert['value'] = $request->currency;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'currency_symbol';
        $insert['value'] = $request->currency_symbol;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'meta_description';
        $insert['value'] = $request->meta_description;
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'keyword';
        $insert['value'] = $request->keyword;
        DB::table('settings')->updateOrInsert($where, $insert);

        return redirect()->back()->with("success", "Data updated successfully"); 
        
    }
}
