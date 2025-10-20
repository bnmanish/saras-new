<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Director;


class DirectorsController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>9])->first();
        $directors = Director::where(['status'=>'1'])->get();
        return view('frontend/directors')->with(['page'=>$page,'directors'=>$directors]);
    }
}
