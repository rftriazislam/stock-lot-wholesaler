<?php

namespace App\Help;

use App\Models\Category as ModelsCategory;
use App\Models\Slider;

class Category
{

    public static function category_list()
    {
        $product = ModelsCategory::select('id', 'name', 'image')->where('status', 1)->take(8)->get();
        return $product;
    }

    public static function slider()
    {
        $slider = Slider::where('status', 1)->get();
        return $slider;
    }
}