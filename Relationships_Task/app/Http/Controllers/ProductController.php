<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request,$id){
        $category=Category::query()->find($id);
        if(!$category){
        return $this->success(null,404,'category not found');
        }
        $product = $category->products()->create( $request->validated());
        return $this->success($product, 201, 'product created successfully');
    }



    public function retrieve_a_single_product($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return $this->success(null,404, 'product not found');
        }
        return $this->success($product, 200, 'product retrieved successfully');
    }




}
