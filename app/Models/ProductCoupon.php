<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCoupon extends Model
{
    use HasFactory;

    protected $guarder = [];

    public function product()
    {
        return $this->belongsTo(homeform::class,'product_id','id');
        # code...
    }
}
