<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'status'
    ];
    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id');
    }
    public function cateproduct()
    {
        return $this->hasMany('App\Models\MerchantProduct', 'category_id', 'id');
    }
}