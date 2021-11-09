<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'whatsapp_number',
        'telegram_number',
        'fb_page',
        'address',
        'logo',
        'nid_front',
        'nid_back',
        'status'
    ];
}