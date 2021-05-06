<?php

namespace App\Models\product;

use App\Models\brand\Brand;
use App\Models\category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    public function Category(){
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function Brand(){
        return $this->belongsTo(Brand::class, 'brand_products', 'product_id', 'brand_id');
    }

    // Simple Attributes
    public function Attribute(){
        return $this->belongsToMany(Attribute::class, 'attribute_products')->where('type', 'Simple');
    }

    // Simple Attributes
    public function VariableAttribute(){
        return $this->belongsToMany(Attribute::class, 'attribute_products')->where('type', 'Variable');
    }
    //product gallery
    public function Productgallery(){
        return $this->hasMany(ProductImageGallery::class, 'product_id', 'id');
    }

    public function Productdata(){
        return $this->hasMany(ProductData::class, 'product_id', 'id');
    }
}
