<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'delivery_date',
        'expried_time',
        'status',
    ];


    public function product()
    {

        return $this->hasOne(MerchantProduct::class, 'id', 'product_id');
    }
}