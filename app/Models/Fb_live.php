<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fb_live extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'page_name',
        'status'
    ];
}