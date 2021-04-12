<?php

namespace App\Models\slider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider_text_1', 'slider_text_2', 'slider_text_3', 'btn_text_1', 'btn_url_1',
        'btn_text_2', 'btn_url_2', 'slider_description','slider_image'
    ];

    public function getImgPathAttribute(){
        if($this->slider_image){
            return asset('uploads/media/'.$this->slider_image);
        }else{
            return null;
        }
    }
}
