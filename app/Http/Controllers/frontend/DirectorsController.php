<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Director;
use App\Models\OurTeam;


class DirectorsController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>9])->first();
        $directors = Director::where(['status'=>'1'])->get();
        return view('frontend/directors')->with(['page'=>$page,'directors'=>$directors]);
    }

    public function ourTeam(){
        $page = Page::where(['id'=>26])->first();
        $teamMembers = OurTeam::orderBy('created_at', 'desc')->get();
        return view('frontend/our_team')->with(['page'=>$page,'teamMembers'=>$teamMembers]);
    }
}
