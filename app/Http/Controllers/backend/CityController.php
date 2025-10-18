<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Session;

class CityController extends Controller
{
    public function addCity(){
        return view('backend/city/add_city');
    }

    public function stroeCity(Request $request){

        // return $request->all();

        $this->validate($request,[
            'title' => 'required|unique:cities|max:255',
            'url' => 'unique:cities|max:255',
            'sequence' => 'numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
            'image' => 'image',
        ]);

        $img = $request->file('image');

        $city = new City;
        $city->title = $request->title;
        $city->sequence = $request->sequence;
        $city->url = $request->url;
        $city->meta_title = $request->meta_title;
        $city->meta_keywords = $request->meta_keywords;
        $city->meta_description = $request->meta_description;
        $city->short_description = $request->short_description;
        $city->description = $request->desciption;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/city'),$imgname);
            $city->image = $imgname;
        }
        $city->status = $request->status;
        $city->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.city');
    }

    public function listCity(){
        $data = City::select('id','title','sequence','image','status')->orderBy('id','asc')->get();
        return view('backend/city/list_city')->with(['data'=>$data]);
    }

    public function editCity(Request $request,$id){
        $data = City::where('id',$id)->first();
        return view('backend/city/edit_city')->with(['data'=>$data]);
    }

    public function editStoreCity(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:255|unique:cities,title,'.$id,
            'url' => 'required|max:255|unique:cities,title,'.$id,
            'sequence' => 'nullable|numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
        ]);

        $img = $request->file('image');

        if($img){
            $old = City::find($id);
            if(is_file(base_path('public/uploads/city/'.$old->image))){
                unlink(base_path('public/uploads/city/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/city'),$imgname);
            $data = array(
                "title" => $request->title,
                "url" => $request->url,
                "sequence" => $request->sequence,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "short_description" => $request->short_description,
                "description" => $request->desciption,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "url" => $request->url,
                "sequence" => $request->sequence,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "short_description" => $request->short_description,
                "status" => $request->status,
            );
        }
        City::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.city');
    }

    public function deleteCity($id){
        $old = City::find($id);
        if(is_file(base_path('public/uploads/city/'.$old->image))){
            unlink(base_path('public/uploads/city/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.city');
    }
}
