<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartAdd extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'vendor_id',
        'user_id',
        'qty',
        'size',
        'color',
        'status'
    ];

    public function vendor()
    {
        return $this->hasOne('App\Models\MerchantShop', 'user_id', 'vendor_id');
    }
    public function product()
    {
        return $this->belongsTo(MerchantProduct::class);
    }
}