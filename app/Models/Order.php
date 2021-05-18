<?php

namespace App\Models;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function customer_purchase()
    {
        return $this->hasOne('App\Models\Customer_purchase','order_id');
    }
    public function attribute()
    {
        return $this->hasOne('App\Models\Order_attribute','order_id');
    }
    
 
    public function item()
     {
        return $this->belongsToMany('App\Models\Product','order_items','order_id','product_id')->withPivot('quantity','price');
     }
     public function delivery()
     {
         return $this->hasOne('App\Models\Delivery_parcel','order_id');
     }
    
}
