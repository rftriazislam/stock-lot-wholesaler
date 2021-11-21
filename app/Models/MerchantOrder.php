<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'buyer_id',
        'tx_id',
        'vendor_id',
        'order_list',
        'delivery_details',
        'amount',
        'total_amount',
        'total_service_charge',
        'transanction_id',
        'status'
    ];
    protected $casts = [
        'order_list' => 'array',
        'delivery_details' => 'array'
    ];
}