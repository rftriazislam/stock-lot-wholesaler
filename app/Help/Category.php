<?php

namespace App\Help;

use App\Models\Category as ModelsCategory;
use App\Models\Slider;

class Category
{

    public static function category_list()
    {
        $product = ModelsCategory::where('status', 1)->get();
        return $product;
    }

    public static function slider()
    {
        $slider = Slider::where('status', 1)->get();
        return $slider;
    }
}