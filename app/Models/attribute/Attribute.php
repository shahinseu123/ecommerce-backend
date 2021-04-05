<?php

namespace App\Models\attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable  =  ['attr_name'];

    public function AttributeItem(){
        return $this->hasMany(AttributeItem::class, 'attr_id', 'id');
    }
}
