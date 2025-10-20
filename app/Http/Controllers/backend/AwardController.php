<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;
use Session;
use Illuminate\Validation\Rule;

class AwardController extends Controller
{
    public function addAward(){
        return view('backend/award/add_award');
    }

    public function stroeAward(Request $request){

        // return $request->all();

        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('awards', 'title')],
            'url' => ['nullable', 'max:255', Rule::unique('awards', 'url')],
            'sequence' => ['nullable', 'numeric'],
            'meta_title' => ['nullable', 'max:1000'],
            'meta_keywords' => ['nullable', 'max:1000'],
            'meta_description' => ['nullable', 'max:1000'],
            'status' => ['required'],
            'image' => ['nullable', 'image'],
        ]);

        $img = $request->file('image');

        $award = new Award;
        $award->title = $request->title;
        $award->sequence = $request->sequence;
        $award->url = $request->url;
        $award->meta_title = $request->meta_title;
        $award->meta_keywords = $request->meta_keywords;
        $award->meta_description = $request->meta_description;
        $award->short_description = $request->short_description;
        $award->description = $request->desciption;
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
        $data = Award::select('id','title','sequence','image','status')->orderBy('id','asc')->get();
        return view('backend/award/list_award')->with(['data'=>$data]);
    }

    public function editAward(Request $request,$id){
        $data = Award::where('id',$id)->first();
        return view('backend/award/edit_award')->with(['data'=>$data]);
    }

    public function editStoreAward(Request $request,$id){
        $request->validate([
            'title' => ['required','max:255',Rule::unique('awards', 'title')->ignore($id)],
            'url' => ['nullable','max:255',Rule::unique('awards', 'url')->ignore($id)],
            'sequence' => ['nullable','numeric'],
            'meta_title' => ['max:1000'],
            'meta_keywords' => ['max:1000'],
            'meta_description' => ['max:1000'],
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