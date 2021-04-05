<?php

namespace App\Models\attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'attr_id'];
}
