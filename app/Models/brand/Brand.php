<?php

namespace App\Models\brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_title', 'short_description', 'brand_description',
        'brand_image', 'meta_title', 'meta_description', 'meta_tags'
    ];

    public function getImagePathAttribute(){
        if($this->brand_image){
            return asset('uploads/media/'.$this->brand_image);
        }else{
            return null;
        }
    }
}
