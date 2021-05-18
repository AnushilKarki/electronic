<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable,TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    public function product_rating()
    {
        return $this->hasMany('App\Models\Product_rating','product_id');
    }
    public function wishlist()
    {
        return $this->hasMany('App\Models\Wishlist','user_id');
    }
    public function customerservice()
    {
        return $this->hasMany('App\Models\Customer_service');
    }
    public function customerpurchase()
    {
        return $this->hasMany('App\Models\Customer_purchase','user_id');
    }
    public function complain()
    {
        return $this->hasMany('App\Models\Complain');
    }
    public function discount()
    {
        return $this->hasMany('App\Models\Discount','user_id');
    }
    public function note()
    {
        return $this->hasMany('App\Models\Note','user_id');
    }
    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order','user_id');
    }
    public function delivery()
    {
        return $this->hasMany('App\Models\Delivery_parcel','user_id');
    }
}
