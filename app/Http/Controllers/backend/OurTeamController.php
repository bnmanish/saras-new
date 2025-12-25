<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use Session;

class OurTeamController extends Controller
{
    public function addOurTeam(){
        return view('backend/our_team/add_our_team');
    }

    public function storeOurTeam(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'short_bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('photo');

        $ourTeam = new OurTeam;
        $ourTeam->name = $request->name;
        $ourTeam->designation = $request->designation;
        $ourTeam->short_bio = $request->short_bio;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/our_team'),$imgname);
            $ourTeam->photo = $imgname;
        }
        $ourTeam->save();

        Session::flash('success','Our Team member added successfully!');
        return redirect()->route('admin.list.our_team');
    }

    public function listOurTeam(){
        $data = OurTeam::orderBy('created_at','desc')->get();
        return view('backend/our_team/list_our_team')->with(['data'=>$data]);
    }

    public function editOurTeam($id){
        $data = OurTeam::where('id',$id)->first();
        return view('backend/our_team/edit_our_team', compact('data'));
    }

    public function editStoreOurTeam(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'short_bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('photo');

        if($img){
            $old = OurTeam::find($id);
            if(is_file(base_path('public/uploads/our_team/'.$old->photo))){
                unlink(base_path('public/uploads/our_team/'.$old->photo));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/our_team'),$imgname);
            $data = array(
                "name" => $request->name,
                "designation" => $request->designation,
                "short_bio" => $request->short_bio,
                "photo" => $imgname,
            );
        }else{
            $data = array(
                "name" => $request->name,
                "designation" => $request->designation,
                "short_bio" => $request->short_bio,
            );
        }
        OurTeam::where('id',$id)->update($data);
        Session::flash('success','Our Team member updated successfully!');
        return redirect()->route('admin.list.our_team');
    }

    public function deleteOurTeam($id){
        $old = OurTeam::find($id);
        if(is_file(base_path('public/uploads/our_team/'.$old->photo))){
            unlink(base_path('public/uploads/our_team/'.$old->photo));
        }
        $old->delete();
        Session::flash('success','Our Team member deleted successfully!');
        return redirect()->route('admin.list.our_team');
    }
}