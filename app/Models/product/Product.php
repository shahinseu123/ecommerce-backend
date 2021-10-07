<?php

namespace App\Models\product;

use App\Models\brand\Brand;
use App\Models\category\Category;
use App\Models\attribute\Attribute;
use App\Models\cupon\Cupon;
use App\Models\rating\Rate;
use App\Models\wish\WishList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function Wish()
    {
        return $this->hasMany(WishList::class, 'product_id');
    }

    public function Category()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function Brand()
    {
        return $this->belongsToMany(Brand::class, 'brand_products', 'product_id', 'brand_id');
    }

    public function Cupon()
    {
        return $this->belongsToMany(Cupon::class, 'cupon_id', 'product_id',  'cupon_product');
    }
    public function CuponEx()
    {
        return $this->belongsToMany(Cupon::class, 'cupon_id', 'product_id',  'cupon_product_exclude');
    }

    // Simple Attributes
    public function Attribute()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_products', 'product_id', 'attribute_id')->where('type', 'Variable');
    }

    // Simple Attributes
    public function VariableAttribute()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_products')->where('type', 'Variable');
    }
    //product gallery
    public function Productgallery()
    {
        return $this->hasMany(ProductImageGallery::class, 'product_id', 'id');
    }

    public function Productdata()
    {
        return $this->hasMany(ProductData::class, 'product_id', 'id');
    }

    public function getImgPathAttribute()
    {
        if ($this->product_image) {
            return asset('/uploads/media/', $this->product_image);
        } else {
            return null;
        }
    }

    public function Rating()
    {
        return $this->hasMany(Rate::class, 'product_id');
    }
}
