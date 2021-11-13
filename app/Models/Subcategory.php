<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'image',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function merchantproduct()
    {
        return $this->hasMany('App\Models\MerchantProduct', 'subcategory_id', 'id');
    }
}