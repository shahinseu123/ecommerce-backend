<?php

namespace App\Models;

use App\Models\cupon\Cupon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\order\Order;
use App\Models\rating\Rate;
use App\Models\wish\WishList;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'user_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Cupon()
    {
        return $this->belongsToMany(Cupon::class, 'copun_user', 'user_id', 'cupon_id');
    }

    public function getImgPathAttribute()
    {
        if ($this->user_image) {
            return asset('uploads/media/' . $this->user_image);
        } else {
            return null;
        }
    }

    public function Order()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    public function Wish()
    {
        return $this->hasMany(WishList::class, 'user_id');
    }

    public function Rating()
    {
        return $this->hasMany(Rate::class, 'user_id');
    }
}
