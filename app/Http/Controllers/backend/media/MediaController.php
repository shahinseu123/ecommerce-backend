<?php

namespace App\Http\Controllers\backend\media;

use App\Http\Controllers\Controller;
use App\Models\media\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(){
        $media = Media::orderBy('id', 'asc')->get();
        return view('backend.media.index')->with('media', $media);
    }

    public function index_ajex(){
       $media = Media::orderBy('id', 'desc')->get();
       return $media;
    }

    public function library(){
        $media = Media::orderBy('id', 'desc')->get();
        return view('backend.media.library_index')->with('media', $media);
    }

    public function library_add(){
        return view('backend.media.add_media');
    }

    public function library_image_action(Request $request){
        $media = new Media();
        $image = $request->file('file');
        // dd($image);
        // if($request->file('file')){
        //     return 123;
        // }
        // $image_size = ImageSize::first();
        // $sm_h = $image_size->sm_img_height ?? 100;
        // $sm_w = $image_size->sm_img_width ?? 100;
        // $md_h = $image_size->md_img_height ?? 100;
        // $md_w = $image_size->md_img_width ?? 100;
        // $lg_h = $image_size->lg_img_height ?? 100;
        // $lg_w = $image_size->lg_img_width ?? 100;
        $imageName = time().'.'.$image->getClientOriginalExtension();

        // $image_resize = Image::make($image->getRealPath());
        //sm
        // $image_resize->fit($sm_h, $sm_w);
        // $image_resize->save(public_path('/uploads/media/400/' . $imageName));
        // //md
        // $image_resize->fit($md_h, $md_w);
        // $image_resize->save(public_path('/uploads/media/600/' . $imageName));
        // //lg
        // $image_resize->fit($lg_h, $lg_w);
        // $image_resize->save(public_path('/uploads/media/800/' . $imageName));
        // // dd(123);

        $image->move(public_path('uploads/media'), $imageName);
        $media->media_image = $imageName;
        $media->save();
        return response()->json(['success' => $imageName]);
    }

    public function library_image_delete(Request $request){
        foreach($request->image_id as $item){
            Media::findOrFail($item)->delete();
        }
        return ["message" => "Image deleted successfully"];
    }
}
