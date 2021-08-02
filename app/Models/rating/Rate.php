<?php

namespace App\Models\rating;

use App\Models\product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
