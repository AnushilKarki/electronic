<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop','shop_id');
    }
    public function team()
    {
        return $this->belongsTo('App\Models\Team','team_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }
}
