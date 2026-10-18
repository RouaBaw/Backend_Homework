<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request){
        $category=Category::query()->create($request->validated());
        return $this->success($category, 201, 'category created successfully');
    }



    public function retrieve_a_category_by_ID($id)
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
        return $this->success(null,404, 'category not found');
        }
        return $this->success($category,200,'category retrieved successfully');
    }



    public function destroy($id){
    $category = Category::find($id);

    if (!$category) {
        return $this->success(null, 404, 'category not found');
    }

    if ($category->products()->exists()) {
        return $this->success(null,409,'category cannot be deleted because it has products');
    }

    $category->delete();

    return $this->success($category,200,'category deleted successfully');
}




}
