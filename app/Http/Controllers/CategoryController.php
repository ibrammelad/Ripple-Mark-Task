<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function mainCategories(){
        $categories = Category::selection()
            ->where('parent_id' , null)
            ->get();
        return view('welcome', compact('categories'));
    }
    public function getCategories($id){
        $categories['data'] = Category::selection()
            ->where('parent_id' , $id)
            ->get();
        return response()->json($categories);
    }
    public function subSubCategories($id){
        $categories['data'] = Category::selection()
            ->where('parent_id' , $id)
            ->get();
        return response()->json($categories);
    }
}
