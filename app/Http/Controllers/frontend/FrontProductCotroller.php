<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontProductCotroller extends Controller
{
    public function index(){
        // $data = DealershipEnquiry::orderBy('created_at', 'desc')->get();
        // return view('frontend/products')->with(['data' => $data]);
        return view('frontend/products');
        // echo "212312";
    }
}
