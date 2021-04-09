<?php

namespace App\Models\menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['menu_name'];

    public function Items(){
        return $this->hasMany(MenuItem::class, 'menu_id', 'id')->where('parent_id', null)->orderBy('position');
    }
}
