<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontProductCotroller extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $categoryId = $request->get('category');
            if ($categoryId) {
                $products = Product::with(['category', 'primaryImage'])->where('category_id', $categoryId)->get();
            } else {
                $products = Product::with(['category', 'primaryImage'])->get();
            }

            return response()->json($products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'pack_size' => $product->pack_size,
                    'category_id' => $product->category_id,
                    'primary_image' => $product->primaryImage ? $product->primaryImage->image_path : null,
                ];
            }));
        }
        $products = Product::with(['category', 'primaryImage'])->get();
        $categories = Category::get();
        return view('frontend/products', compact('products', 'categories'));
    }
}
