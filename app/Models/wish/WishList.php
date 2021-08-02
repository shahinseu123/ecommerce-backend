<?php

namespace App\Models\wish;

use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
