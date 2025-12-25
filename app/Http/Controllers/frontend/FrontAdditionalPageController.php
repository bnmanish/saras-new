<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdditionalPage;


class FrontAdditionalPageController extends Controller
{
    public function additionalPage($slug){
        $page = AdditionalPage::where(['slug'=>$slug,'status'=>'1'])->firstOrFail();
        return view('frontend/additional_page')->with(['page'=>$page]);
    }
}
