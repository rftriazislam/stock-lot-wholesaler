<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransanctionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'buyer_id',
        'tx_id',
        'vendor_id',
        'order_list',
        'amount',
        'transaction_status',
        'status'
    ];
    protected $casts = [
        'order_list' => 'array'
    ];
}