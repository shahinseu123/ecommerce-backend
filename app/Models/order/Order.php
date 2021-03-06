<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Order Products
    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
