<?php

namespace App\Models\parallax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parallax extends Model
{
    use HasFactory;

    protected $fillable = ['parallax_title', 'description', 'parallax_image', 'parallax_position'];
}
