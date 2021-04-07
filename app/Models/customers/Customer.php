<?php

namespace App\Models\customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'street', 'zip',
     'city', 'state', 'country', 'customer_image', 'password'];

    public function getImgPathAttribute(){
        if($this->customer_image){
            return asset('uploads/media/'.$this->customer_image);
        }else{
            return null;
        }
    } 
}
