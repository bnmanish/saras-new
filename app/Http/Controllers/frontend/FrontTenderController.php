<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontTenderController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>18])->first();
        return view('frontend/tenders')->with(['page'=>$page]);
    }
}
