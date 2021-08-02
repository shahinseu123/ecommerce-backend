<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductStock extends Model
{
    use HasFactory;

    public function Stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
