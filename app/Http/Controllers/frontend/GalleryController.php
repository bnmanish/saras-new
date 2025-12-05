<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Models\Page;

class GalleryController extends Controller
{
    public function index($categorySlug = null)
    {
        $page = Page::where(['id'=>22])->first();
        if ($categorySlug) {
            $category = GalleryCategory::where('slug', $categorySlug)->where('status', '1')->firstOrFail();
            $galleries = Gallery::where('category_id', $category->id)->with('images')->get();
        } else {
            $category = null;
            $galleries = Gallery::with('images', 'category')->get();
        }

        $galleryCategories = GalleryCategory::where('status', '1')->get();

        return view('frontend/gallery', compact('galleries', 'galleryCategories', 'category', 'page'));
    }
}