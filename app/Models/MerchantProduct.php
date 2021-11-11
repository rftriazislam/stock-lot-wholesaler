<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'subcategory_id',
        'product_name',
        'product_id',
        'description',
        'size',
        'unit',
        'color',
        'stock',
        'mini_order',
        'order_note',
        'price',
        'files',
        'video_link',
        'service_charge',
        'status',
    ];
    protected $casts = [
        'files' => 'array',
        'color' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}