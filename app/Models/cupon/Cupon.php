<?php

namespace App\Models\cupon;

use App\Models\category\Category;
use App\Models\product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'cupon_product', 'cupon_id',  'product_id');
    }
    public function ProductEX()
    {
        return $this->belongsToMany(Product::class, 'cupon_product_exclude', 'cupon_id',  'product_id');
    }

    public function Category()
    {
        return $this->belongsToMany(Category::class, 'cupon_category', 'cupon_id', 'category_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class, 'copun_user', 'cupon_id', 'user_id');
    }
}
