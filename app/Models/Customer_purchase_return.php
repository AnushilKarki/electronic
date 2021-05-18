<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_purchase_return extends Model
{
    use HasFactory;
    public function purchase()
    {
        return $this->belongsTo('App\Models\Customer_purchase','purchase_id');
    }
   
}
