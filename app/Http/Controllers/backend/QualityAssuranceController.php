<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QualityAssurance;
use Session;

class QualityAssuranceController extends Controller
{
    public function addQualityAssurance(){
        return view('backend/quality_assurance/add_quality_assurance');
    }

    public function storeQualityAssurance(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $img = $request->file('image');

        $qa = new QualityAssurance;
        $qa->title = $request->title;
        $qa->description = $request->description;
        $qa->status = $request->status;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/quality_assurance'),$imgname);
            $qa->image = $imgname;
        }
        $qa->save();

        Session::flash('success','Quality Assurance added successfully!');
        return redirect()->route('admin.list.quality_assurance');
    }

    public function listQualityAssurance(){
        $data = QualityAssurance::orderBy('created_at','desc')->get();
        return view('backend/quality_assurance/list_quality_assurance')->with(['data'=>$data]);
    }

    public function editQualityAssurance($id){
        $data = QualityAssurance::where('id',$id)->first();
        return view('backend/quality_assurance/edit_quality_assurance', compact('data'));
    }

    public function editStoreQualityAssurance(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = QualityAssurance::find($id);
            if(is_file(base_path('public/uploads/quality_assurance/'.$old->image))){
                unlink(base_path('public/uploads/quality_assurance/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/quality_assurance'),$imgname);
            $data = array(
                "title" => $request->title,
                "description" => $request->description,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "description" => $request->description,
                "status" => $request->status,
            );
        }
        QualityAssurance::where('id',$id)->update($data);
        Session::flash('success','Quality Assurance updated successfully!');
        return redirect()->route('admin.list.quality_assurance');
    }

    public function deleteQualityAssurance($id){
        $old = QualityAssurance::find($id);
        if(is_file(base_path('public/uploads/quality_assurance/'.$old->image))){
            unlink(base_path('public/uploads/quality_assurance/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Quality Assurance deleted successfully!');
        return redirect()->route('admin.list.quality_assurance');
    }
}