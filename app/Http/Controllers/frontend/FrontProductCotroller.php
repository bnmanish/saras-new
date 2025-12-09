<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Page;

class FrontProductCotroller extends Controller
{
    public function index(Request $request){
        $page = Page::where(['id'=>17])->first();
        $products = Product::with(['category', 'primaryImage'])->get();
        $categories = Category::get();
        $activeCategory = null;
        return view('frontend/products', compact('products', 'categories','page', 'activeCategory'));
    }

    public function category($categorySlug){
        $page = Page::where(['id'=>17])->first();
        $products = Product::with(['category', 'primaryImage'])->get();
        $categories = Category::get();
        $activeCategory = $categorySlug;
        return view('frontend/products', compact('products', 'categories','page', 'activeCategory'));
    }

    public function details($slug){
        $product = Product::with(['category', 'images', 'primaryImage'])->where('slug', $slug)->firstOrFail();
        
        // Get related products
        $relatedProducts = collect(); // Always return a collection
        if ($product->related_products && is_array($product->related_products)) {
            // Convert string IDs to integers for proper comparison
            $relatedIds = array_map('intval', $product->related_products);
            $relatedProducts = Product::with(['category', 'primaryImage'])
                ->whereIn('id', $relatedIds)
                ->where('status', '1')  // Compare with string since status is stored as string
                ->where('id', '!=', $product->id)
                ->get();
        }
        
        return view('frontend/product_details', compact('product', 'relatedProducts'));
    }

}