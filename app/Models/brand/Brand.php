<?php

namespace App\Models\brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product\Product;

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

    public function Product(){
        return $this->hasMany(Product::class, 'brand_products', 'brand_id', 'product_id');
    }
}
