<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_sub_categories(Request $request)
    {
        $sub_categories = Category::where('category_id', $request->category_id)->get();
        return response()->json([
            'sub_categories' => $sub_categories
        ]);
    }
}
