<?php

namespace App\Models\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_title', 'blog_description', 'blog_title_bd', 'blog_description_bd',
        'blog_image', 'meta_title', 'meta_description', 'meta_tags'
    ];

    public function getImagePathAttribute()
    {
        if ($this->blog_image) {
            return asset('uploads/media/' . $this->blog_image);
        } else {
            return null;
        }
    }
}
