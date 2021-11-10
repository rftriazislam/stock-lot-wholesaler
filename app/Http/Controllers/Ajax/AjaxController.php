<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function subcategory_list(Request $request)
    {
        $subcategory = Subcategory::where("category_id", $request->category_id)->where('status', 1)
            ->pluck("name", "id");
        return response()->json($subcategory);
    }
}