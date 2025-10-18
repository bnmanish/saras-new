<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Session;

class AmenityController extends Controller
{
    public function addAmenity(){
        return view('backend/amenity/add_amenity');
    }

    public function stroeAmenity(Request $request){

        $this->validate($request,[
            'title' => 'required|unique:brands|max:255',
            'status' => 'required',
            'image' => 'required|image',
        ]);

        $img = $request->file('image');

        $amenity = new Amenity;
        $amenity->title = $request->title;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/amenity'),$imgname);
            $amenity->image = $imgname;
        }
        $amenity->status = $request->status;
        $amenity->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.amenity');
    }

    public function listAmenity(){
        $data = Amenity::select('id','title','image','status')->orderBy('id','asc')->get();
        return view('backend/amenity/list_amenity')->with(['data'=>$data]);
    }

    public function editAmenity(Request $request,$id){
        $data = Amenity::where('id',$id)->first();
        return view('backend/amenity/edit_amenity')->with(['data'=>$data]);
    }

    public function editStoreAmenity(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:255|unique:brands,title,'.$id,
            'status' => 'required',
            'image' => 'nullable|image',
        ]);

        $img = $request->file('image');

        if($img){
            $old = Amenity::find($id);
            if(is_file(base_path('public/uploads/amenity/'.$old->image))){
                unlink(base_path('public/uploads/amenity/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/amenity'),$imgname);
            $data = array(
                "title" => $request->title,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "status" => $request->status,
            );
        }
        Amenity::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.amenity');
    }

    public function deleteAmenity($id){
        $old = Amenity::find($id);
        if(is_file(base_path('public/uploads/amenity/'.$old->image))){
            unlink(base_path('public/uploads/amenity/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.amenity');
    }
}
