<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class AboutController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>2])->first();
        return view('frontend/about_us')->with(['page'=>$page]);
    }
    
    public function chairmanMessage(){
        $page = Page::where(['id'=>14])->first();
        return view('frontend/chairman_message')->with(['page'=>$page]);
    }

    public function mdMessage(){
        $page = Page::where(['id'=>15])->first();
        return view('frontend/md_message')->with(['page'=>$page]);
    }

}
