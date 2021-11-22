<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransanctionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'pyment_status',
        'payment_type'
    ];
}