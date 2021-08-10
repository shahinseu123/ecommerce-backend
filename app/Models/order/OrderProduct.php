<?php

namespace App\Models\order;

use App\Models\product\Product;
use App\Models\product\ProductData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function ProductData()
    {
        return $this->belongsTo(ProductData::class);
    }

    public function OrderProductStocks()
    {
        return $this->hasMany(OrderProductStock::class);
    }
}
