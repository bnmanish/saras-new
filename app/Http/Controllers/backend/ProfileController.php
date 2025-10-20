<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Session;

class ProfileController extends Controller
{
    public function addProfile(){
        return view('backend/profile/add_profile');
    }

    public function stroeProfile(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        $profile = new Profile;
        $profile->name = $request->name;
        $profile->position = $request->position;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/profile'),$imgname);
            $profile->image = $imgname;
        }
        $profile->status = $request->status;
        $profile->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.profile');
    }

    public function listProfile(){
        $data = Profile::select('id','name','position','image','status')->orderBy('id','asc')->get();
        return view('backend/profile/list_profile')->with(['data'=>$data]);
    }

    public function editProfile(Request $request,$id){
        $data = Profile::where('id',$id)->first();
        return view('backend/profile/edit_profile')->with(['data'=>$data]);
    }

    public function editStoreProfile(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = Profile::find($id);
            if(is_file(base_path('public/uploads/profile/'.$old->image))){
                unlink(base_path('public/uploads/profile/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/profile'),$imgname);
            $data = array(
                "name" => $request->name,
                "position" => $request->position,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "name" => $request->name,
                "position" => $request->position,
                "status" => $request->status,
            );
        }
        Profile::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.profile');
    }

    public function deleteProfile($id){
        $old = Profile::find($id);
        if(is_file(base_path('public/uploads/profile/'.$old->image))){
            unlink(base_path('public/uploads/profile/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.profile');
    }
}