<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Type;
use App\Models\City;
use App\Models\Brand;
use App\Models\AdditionalPage;
use App\Models\Subscriber;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use DB;

class HomeController extends Controller
{
    public function home(){
        $slider = Slider::select('desciption','image')->where('status','1')->orderBy('sorting_order','asc')->get();
        $page = Page::where(['id'=>1])->first();
        $about = Page::where(['id'=>2])->first();
        $categories = Category::select('title','icon')->where('status','1')->orderBy('id','asc')->get();
        $products = Product::with(['primaryImage', 'category'])->where('status', '1')->inRandomOrder()->limit(10)->get();

        $testimonials = Testimonial::where(['status'=>'1'])->orderBy('created_at','desc')->get();
        $blogs = Blog::where('status','1')->orderBy('created_at','desc')->limit(3)->get();
        return view('frontend/home')->with(['slider'=>$slider,'page'=>$page,'about'=>$about,'categories'=>$categories, 'products'=>$products, 'testimonials'=>$testimonials]);
    }

    public function searchProject(Request $request){

        $page = Page::where(['id'=>9])->first();
        $type = Type::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $city = City::where(['status'=>'1'])->orderBy('sequence','asc')->get();
        $brand = Brand::where(['status'=>'1'])->orderBy('sequence','asc')->get();

        $propertyFor = $request->property_for;
        $property_type = $request->property_type;
        $location = $request->location;
        $brandVar = $request->brand;

        $data = Project::where(['status'=>'1']);
        if($propertyFor){
            $data = $data->where('project_for',$propertyFor);
        }

        if($property_type){
            $typeSearch = Type::where(['url'=>$property_type])->first();
            if($typeSearch){
                $data = $data->where('type_id',$typeSearch->id);
            }
        }

        if($location){
            $citySearch = City::where(['url'=>$location])->first();
            if($citySearch){
                $data = $data->where('city_id',$citySearch->id);
            }
        }

        if($brandVar){
            $brandSearch = Brand::where(['url'=>$brandVar])->first();
            if($brandSearch){
                $data = $data->where('brand_id',$brandSearch->id);
            }
        }

        $data = $data->paginate(20);

        return view('frontend/project_list')->with(['data'=>$data,'page'=>$page,'type'=>$type,'city'=>$city,'brand'=>$brand]);

    }

    public function additionalPage($slug){
        $page = AdditionalPage::where(['slug'=>$slug,'status'=>'1'])->firstOrFail();
        return view('frontend/additional_page')->with(['page'=>$page]);
    }

    public function subscribeNewsLetter(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50|unique:subscribers,email',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }
        $subscribe = new Subscriber;
        $subscribe->email = $request->email;
        $subscribe->save();
        return response()->json(array('status'=>true,'message'=>'Greate ! You have subscribed successfully.'));
    }
  
  	public function error404(){
        $page = Page::where(['id'=>2])->first();
        return view('frontend/404')->with(['page'=>$page]);
    }

}
