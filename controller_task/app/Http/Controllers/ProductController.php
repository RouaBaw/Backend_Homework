<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReduceStockRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
        $products=Product::query()->get();
        return $this->success($products,200,'products retrieved successfully');
    }

    public function show($id){
        $products=Product::query()->where('id',$id)->first();
        return $this->success($products,200,'products retrieved successfully');
    }

     public function store(StoreProductRequest $request){
        $products=Product::query()->create($request->validated());
        return $this->success($products,201,'products created successfully');
    }


     public function update(UpdateProductRequest $request, $id)
    {
    $products = Product::query()->where('id', $id)->first();

    $products->update($request->validated());

    return $this->success($products, 200, 'product updated successfully');
    }

    public function destroy($id){
        $products=Product::query()->where('id',$id)->delete();
        return $this->success($products,200,'products deleted successfully');
    }


    public function reduce_stock(ReduceStockRequest $request, $id)
    {
    $product = Product::query()->where('id', $id)->first();

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    if ($product->quantity >= $request->amount) {
        $product->quantity -= $request->amount;
        $product->save();

        return $this->success($product,200,'product stock reduced successfully');
    }

    return response()->json(['message' => 'Not enough stock'], 400);
}

}
