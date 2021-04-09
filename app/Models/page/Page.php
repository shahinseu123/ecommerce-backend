<?php

namespace App\Models\page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title', 'short_description', 'page_description', 
        'page_image', 'meta_title', 'meta_title', 'meta_tags'
    ];

    public function getImgPathAttribute(){
        if($this->page_image){
            return asset('uploads/media/'.$this->page_image);
        }else{
            return null;
        }
    }
}
