<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AwardController extends Controller
{
    public function addAward(){
        return view('backend/award/add_award');
    }

    public function storeAward(Request $request){

        // return $request->all();

        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('awards', 'title')],
            'status' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $img = $request->file('image');

        $award = new Award;
        $award->title = $request->title;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/award'),$imgname);
            $award->image = $imgname;
        }
        $award->status = $request->status;
        $award->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.award');
    }

    public function listAward(){
        $data = Award::select('id','title','image','status')->orderBy('id','asc')->get();
        return view('backend/award/list_award')->with(['data'=>$data]);
    }

    public function editAward(Request $request,$id){
        $data = Award::where('id',$id)->first();
        return view('backend/award/edit_award')->with(['data'=>$data]);
    }

    public function editStoreAward(Request $request,$id){
        $request->validate([
            'title' => ['required','max:255',Rule::unique('awards', 'title')->ignore($id)],
            'status' => ['required'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = Award::find($id);
            if(is_file(base_path('public/uploads/award/'.$old->image))){
                unlink(base_path('public/uploads/award/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/award'),$imgname);
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
        Award::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.award');
    }

    public function deleteAward($id){
        $old = Award::find($id);
        if(is_file(base_path('public/uploads/award/'.$old->image))){
            unlink(base_path('public/uploads/award/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.award');
    }
}