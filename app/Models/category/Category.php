<?php

namespace App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_title', 'short_description', 'category_description', 
    'category_image', 'parent_category', 'meta_title', 'meta_description', 'meta_tags'];


    public function Child(){
        return $this->hasMany(Category::class, 'parent_category', 'id');
    }
}

