<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectAmenity;
use App\Models\ProjectSlider;
use App\Models\FloorPlan;
use App\Models\Project;
use App\Models\Amenity;
use App\Models\Brand;
use App\Models\City;
use App\Models\Type;
use Exception;
use Session;

class ProjectController extends Controller
{
    public function addProject(){
        $amenities = Amenity::where('status','1')->get();
        $cities = City::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        $types = Type::where('status','1')->get();
        return view('backend/project/add_project')->with(['amenities'=>$amenities,'cities'=>$cities,'brands'=>$brands,'types'=>$types]);
    }

    public function stroeProject(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:projects,title',
            'slug' => 'required|max:255|unique:projects,url',
            'price' => 'required|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'description' => 'required',
            'city' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'cover_image' => 'required|file|max:2048',
            'slider_images.*' => 'nullable|file|max:2048',
            'floor_plans.*' => 'nullable|file|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        try {
            DB::beginTransaction();
            $project = new Project;
            $project->title = $request->title;
            $project->url = $request->slug;
            $project->sequence = $request->sequence;
            $project->price = $request->price;
            $project->meta_title = $request->meta_title;
            $project->meta_keywords = $request->meta_keywords;
            $project->meta_description = $request->meta_description;
            $project->project_details = $request->project_details;
            $project->description = $request->description;
            $project->project_for = $request->project_for;
            $project->is_rera_approved = $request->rera_approved;
            $project->city_id = $request->city;
            $project->brand_id = $request->brand;
            $project->type_id = $request->type;
            $project->video = $request->video_url;
            $project->map = $request->map;
            $project->address = $request->address;
            $project->status = $request->status;
            $project->section = $request->section;
            $coverImg = $request->file('cover_image');
            if($coverImg){
                $coverImgName = time().'.'.$coverImg->getClientOriginalExtension();
                $coverImg->move(base_path('public/uploads/project/cover'),$coverImgName);
                $project->cover_image = $coverImgName;
            }
            $project->save();

            // amenity starts
            $amenities = $request->amenity;
            if($amenities){
                for($i=0;$i<count($amenities);$i++){
                    $projectAmenity = new ProjectAmenity;
                    $projectAmenity->project_id = $project->id;
                    $projectAmenity->amenity_id = $amenities[$i];
                    $projectAmenity->save();
                }
            }
            // amenity ends

            // slider images starts
            $slider_images = $request->file('slider_images');
            if($slider_images){
                for($i=0;$i<count($slider_images);$i++){
                    $slimg = $slider_images[$i];
                    $slimgName = time().'_'.$i.'.'.$slimg->getClientOriginalExtension();
                    $projectSlider = new ProjectSlider;
                    $projectSlider->project_id = $project->id;
                    $projectSlider->file = $slimgName;
                    $sliderSaved = $projectSlider->save();
                    if($sliderSaved){
                        $slimg->move(base_path('public/uploads/project/slider'),$slimgName);
                    }
                }
            }
            // slider images ends

            // floor plan starts
            $floor_plans = $request->file('floor_plans');
            if($floor_plans){
                for($i=0;$i<count($floor_plans);$i++){
                    $fp = $floor_plans[$i];
                    $fpName = time().'_'.$i.'.'.$fp->getClientOriginalExtension();

                    $floorPlan = new FloorPlan;
                    $floorPlan->project_id = $project->id;
                    $floorPlan->file = $fpName;
                    $floorPlanSaved = $floorPlan->save();
                    if($floorPlanSaved){
                        $fp->move(base_path('public/uploads/project/floor_plan'),$fpName);
                    }
                }
            }
            // floor plan ends

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage().$e->getFile().'-'.$e->getLine();
        }

        Session::flash('success','Added successfully!');
        return response()->json(array('status'=>true,'message'=>'Added successfully!'));
    }

    public function listProject(){
        $data = Project::where(['is_deleted'=>'1'])->orderBy('created_at','desc')->get();
        return view('backend/project/list_project')->with(['data'=>$data]);
    }

    public function editProject(Request $request,$id){
        $amenities = Amenity::where('status','1')->get();
        $cities = City::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        $types = Type::where('status','1')->get();
        $data = Project::where('id',$id)->first();
        $assignedAmenities =  $data->amenities->pluck('id')->toArray();
        $sliderImages =  $data->sliderimages;
        $sliderFloorPlan =  $data->floorplan;
        return view('backend/project/edit_project')->with(['amenities'=>$amenities,'cities'=>$cities,'brands'=>$brands,'types'=>$types,'data'=>$data,'assignedAmenities'=>$assignedAmenities,'sliderImages'=>$sliderImages,'sliderFloorPlan'=>$sliderFloorPlan]);

    }

    public function editStoreProject(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:projects,title,'.$id,
            'slug' => 'required|max:255|unique:projects,url,'.$id,
            'price' => 'required|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'description' => 'required',
            'city' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'cover_image' => 'nullable|file|max:2048',
            'slider_images.*' => 'nullable|file|max:2048',
            'floor_plans.*' => 'nullable|file|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        try {
            DB::beginTransaction();
            $project = new Project;

            $data = array(
                "title" => $request->title,
                "url" => $request->slug,
                "sequence" => $request->sequence,
                "price" => $request->price,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "project_details" => $request->project_details,
                "description" => $request->description,
                "project_for" => $request->project_for,
                "is_rera_approved" => $request->rera_approved,
                "city_id" => $request->city,
                "brand_id" => $request->brand,
                "type_id" => $request->type,
                "video" => $request->video_url,
                "map" => $request->map,
                "address" => $request->address,
                "section" => $request->section,
                "status" => $request->status,
            );
            


            $coverImg = $request->file('cover_image');
            if($coverImg){
                $old = Project::find($id);
                if(is_file(base_path('public/uploads/project/cover/'.$old->cover_image))){
                    unlink(base_path('public/uploads/project/cover/'.$old->cover_image));
                }
                $coverImgName = time().'.'.$coverImg->getClientOriginalExtension();
                $coverImg->move(base_path('public/uploads/project/cover'),$coverImgName);
                $newData = array(
                    "cover_image" => $coverImgName,
                );
                $data = array_merge($data,$newData);
            }

            Project::where('id',$id)->update($data);

            // amenity starts
            $amenities = $request->amenity;
            if($amenities){
                ProjectAmenity::where('project_id',$id)->delete();
                for($i=0;$i<count($amenities);$i++){
                    $projectAmenity = new ProjectAmenity;
                    $projectAmenity->project_id = $id;
                    $projectAmenity->amenity_id = $amenities[$i];
                    $projectAmenity->save();
                }
            }
            // amenity ends

            // slider images starts
            $slider_images = $request->file('slider_images');
            if($slider_images){
                for($i=0;$i<count($slider_images);$i++){
                    $slimg = $slider_images[$i];
                    $slimgName = time().'_'.$i.'.'.$slimg->getClientOriginalExtension();
                    $projectSlider = new ProjectSlider;
                    $projectSlider->project_id = $id;
                    $projectSlider->file = $slimgName;
                    $sliderSaved = $projectSlider->save();
                    if($sliderSaved){
                        $slimg->move(base_path('public/uploads/project/slider'),$slimgName);
                    }
                }
            }
            // slider images ends

            // floor plan starts
            $floor_plans = $request->file('floor_plans');
            if($floor_plans){
                for($i=0;$i<count($floor_plans);$i++){
                    $fp = $floor_plans[$i];
                    $fpName = time().'_'.$i.'.'.$fp->getClientOriginalExtension();

                    $floorPlan = new FloorPlan;
                    $floorPlan->project_id = $id;
                    $floorPlan->file = $fpName;
                    $floorPlanSaved = $floorPlan->save();
                    if($floorPlanSaved){
                        $fp->move(base_path('public/uploads/project/floor_plan'),$fpName);
                    }
                }
            }
            // floor plan ends

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage().$e->getFile().'-'.$e->getLine();
        }

        Session::flash('success','Updated successfully!');
        return response()->json(array('status'=>true,'message'=>'Updated successfully!'));
    }

    public function deleteProject($id){
        $data = array(
            'is_deleted' => '0',
        );
        Project::where(['id'=>$id])->update($data);
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.project');
    }

    public function deleteProjectSlider(Request $request){
        $id = $request->id;
        ProjectSlider::where('id',$id)->delete();
        return response()->json(array('status'=>true,'message'=>'Slider image deleted successfully!'));
    }

    public function deleteProjectFloorPlan(Request $request){
        $id = $request->id;
        FloorPlan::where('id',$id)->delete();
        return response()->json(array('status'=>true,'message'=>'Floor Plan deleted successfully!'));
    }
}
