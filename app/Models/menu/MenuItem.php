<?php

namespace App\Models\menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'item_name', 'position', 'parent_id'];
    public function Parent() {
     return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function Children() {
     return $this->hasMany(MenuItem::class, 'parent_id','id')->orderBy('position');
    }
}
