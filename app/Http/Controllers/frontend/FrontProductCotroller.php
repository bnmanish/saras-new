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
        return view('frontend/products', compact('products', 'categories','page'));
    }

    public function details($slug){
        return view('frontend/product_details');
    }

}
