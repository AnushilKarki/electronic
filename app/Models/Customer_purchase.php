<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_purchase extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function return()
    {
        return $this->hasOne('App\Models\Customer_purchase_return','purchase_id');
    }
}
