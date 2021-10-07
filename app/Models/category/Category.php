<?php

namespace App\Models\category;

use App\Models\cupon\Cupon;
use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_title', 'short_description', 'category_description',
        'category_image', 'parent_category', 'meta_title', 'meta_description', 'meta_tags'
    ];


    public function Child()
    {
        return $this->hasMany(Category::class, 'parent_category', 'id');
    }

    public function getImgPathAttribute()
    {
        if ($this->category_image) {
            return asset('uploads/media/' . $this->category_image);
        } else {
            return null;
        }
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'category_products');
    }

    public function Cupon()
    {
        return $this->belongsToMany(Cupon::class, 'cupon_id', 'category_id', 'cupon_category');
    }
}
