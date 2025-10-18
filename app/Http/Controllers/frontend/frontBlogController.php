<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Blog;

class frontBlogController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>8])->first();
        $blogs = Blog::where('status','1')->orderBy('created_at','desc')->paginate(30);
        return view('frontend/blog')->with(['page'=>$page,'blogs'=>$blogs]);
    }

    public function blogDetails($slug){
        $blog = Blog::where(['slug'=>$slug,'status'=>'1'])->first();
        $blogs = Blog::where('id','!=',$blog->id)->where(['status'=>'1'])->orderBy('created_at','desc')->limit(10)->get();
        return view('frontend/blog-details')->with(['blog'=>$blog,'blogs'=>$blogs]);
    }

}
