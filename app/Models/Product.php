<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
   
    public function productrating()
    {
        return $this->hasMany('App\Models\Product_rating','product_id');
    }
    public function productimage()
    {
        return $this->hasOne('App\Models\Product_image','product_id');
    }

    public function attribute()
     {
        return $this->hasOne('App\Models\Attribute','product_id');
     }
     public function category()
     {
        return $this->belongsToMany(Voyager::modelClass('Category'),'product_categories','product_id','category_id');
     }
     public function wishlist()
     {
         return $this->hasMany('App\Models\Wishlist','product_id');
     }
     public function productdiscount()
     {
         return $this->hasOne('App\Models\Product_discount','product_id');
     }
    
     public function product_customer_service()
     {
         return $this->hasMany('App\Models\Product_customer_service','product_id');
     }
  
     public function easy_order()
     {
         return $this->hasMany('App\Models\Easy_order','product_id');
     }
  
     public function order()
     {
         return $this->belongsToMany('App\Models\Order');
     }
     public function stock()
     {
         return $this->hasOne('App\Models\Stock','product_id');
     }
  
}
