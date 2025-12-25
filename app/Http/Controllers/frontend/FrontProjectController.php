<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Type;
use App\Models\City;
use App\Models\Brand;
use App\Models\Project;

class FrontProjectController extends Controller
{
    public function index(){
        $data = Project::where(['status'=>'1'])->paginate(30);
        $page = Page::where(['id'=>9])->first();
        $type = Type::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $city = City::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $brand = Brand::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        return view('frontend/project_list')->with(['data'=>$data,'page'=>$page,'type'=>$type,'city'=>$city,'brand'=>$brand]);
    }

    public function projectBrandwise($url){
        $data = Brand::where(['url'=>$url,'status'=>'1'])->first();
        $projects = $data->projects()->where(['status'=>'1'])->paginate(10);
        $type = Type::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $city = City::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $brand = Brand::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        return view('frontend/project_list_brand_wise')->with(['data'=>$data,'type'=>$type,'city'=>$city,'brand'=>$brand,'projects'=>$projects]);
    }

    public function projectCitywise($url){
        $data = City::where(['url'=>$url,'status'=>'1'])->first();
        $projects = $data->projects()->where(['status'=>'1'])->paginate(10);
        $type = Type::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $city = City::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $brand = Brand::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        return view('frontend/project_list_brand_wise')->with(['data'=>$data,'type'=>$type,'city'=>$city,'brand'=>$brand,'projects'=>$projects]);
    }

    public function projectTypewise($url){
        $data = Type::where(['url'=>$url,'status'=>'1'])->first();
        $projects = $data->projects()->where(['status'=>'1'])->paginate(10);
        $type = Type::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $city = City::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $brand = Brand::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        return view('frontend/project_list_brand_wise')->with(['data'=>$data,'type'=>$type,'city'=>$city,'brand'=>$brand,'projects'=>$projects]);
    }

    public function projectDetails($slug){
        $feature = Project::where(['status'=>'1','section'=>'featured'])->orderBy('created_at','desc')->limit(6)->get();
        $recent = Project::where(['status'=>'1'])->orderBy('created_at','desc')->limit(6)->get();
        $luxury = Project::where(['status'=>'1','section'=>'luxury'])->limit(10)->get();
        $city = City::select('title','url')->where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $data = Project::where(['url'=>$slug,'status'=>'1'])->first();
        return view('frontend/project_details')->with(['data'=>$data,'feature'=>$feature,'recent'=>$recent,'luxury'=>$luxury,'city'=>$city]);
    }

}
