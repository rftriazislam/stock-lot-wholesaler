<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'country',
        'state',
        'address',
        'note',
        'user_id',
        'status'
    ];
}