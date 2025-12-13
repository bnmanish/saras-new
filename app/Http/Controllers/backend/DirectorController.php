<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Director;
use Illuminate\Support\Facades\Session;

class DirectorController extends Controller
{
    public function addProfile(){
        return view('backend/director/add_director');
    }

    public function storeProfile(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'message' => ['nullable', 'string'],
        ]);

        $img = $request->file('image');

        $profile = new Director;
        $profile->name = $request->name;
        $profile->position = $request->position;
        $profile->message = $request->message;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/director'),$imgname);
            $profile->image = $imgname;
        }
        $profile->status = $request->status;
        $profile->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.director');
    }

    public function listProfile(){
        $data = Director::select('id','name','position','image','status')->orderBy('id','asc')->get();
        return view('backend/director/list_director')->with(['data'=>$data]);
    }

    public function editProfile(Request $request,$id){
        $data = Director::where('id',$id)->first();
        return view('backend/director/edit_director')->with(['data'=>$data]);
    }

    public function editStoreProfile(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'message' => ['nullable', 'string'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = Director::find($id);
            if(is_file(base_path('public/uploads/director/'.$old->image))){
                unlink(base_path('public/uploads/director/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/director'),$imgname);
            $data = array(
                "name" => $request->name,
                "position" => $request->position,
                "message" => $request->message,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "name" => $request->name,
                "position" => $request->position,
                "message" => $request->message,
                "status" => $request->status,
            );
        }
        Director::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.director');
    }

    public function deleteProfile($id){
        $old = Director::find($id);
        if(is_file(base_path('public/uploads/director/'.$old->image))){
            unlink(base_path('public/uploads/director/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.director');
    }
}