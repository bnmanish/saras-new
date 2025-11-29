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
        return view('frontend/product_details', compact('product'));
    }

}
