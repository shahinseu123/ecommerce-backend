<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    use HasFactory;
    protected $fillable = [
        'regular_price','product_id', 'sale_price', 'sku',
        'shipping_weight','shipping_height', 'shipping_lenght', 'rack_number',
        'unit','shipping_height', 'unit_amount','variation_img', 'stock'
    ];

    protected $casts = [
        'product_excerpt' => 'array',
    ];
}
