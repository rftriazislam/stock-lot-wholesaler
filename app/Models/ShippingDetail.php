<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'ship_to',
        'ship_from',

        'ship_cost',
        'ship_media_way',
        'ship_delay',
        'details',
        'status'
    ];
}