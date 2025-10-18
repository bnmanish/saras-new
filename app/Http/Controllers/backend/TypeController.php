<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Session;

class TypeController extends Controller
{
    public function addType(){
        return view('backend/type/add_type');
    }

    public function stroeType(Request $request){

        $this->validate($request,[
            'title' => 'required|unique:types|max:255',
            'url' => 'unique:types|max:255',
            'sequence' => 'numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
        ]);

        $type = new Type;
        $type->title = $request->title;
        $type->sequence = $request->sequence;
        $type->url = $request->url;
        $type->meta_title = $request->meta_title;
        $type->meta_keywords = $request->meta_keywords;
        $type->meta_description = $request->meta_description;
        $type->short_description = $request->short_description;
        $type->description = $request->desciption;
        $type->status = $request->status;
        $type->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.type');
    }

    public function listType(){
        $data = Type::select('id','title','status')->orderBy('id','asc')->get();
        return view('backend/type/list_type')->with(['data'=>$data]);
    }

    public function editType(Request $request,$id){
        $data = Type::where('id',$id)->first();
        return view('backend/type/edit_type')->with(['data'=>$data]);
    }

    public function editStoreType(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:255|unique:types,title,'.$id,
            'url' => 'required|max:255|unique:types,title,'.$id,
            'sequence' => 'nullable|numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
        ]);

        $data = array(
            "title" => $request->title,
            "url" => $request->url,
            "sequence" => $request->sequence,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
            "short_description" => $request->short_description,
            "description" => $request->desciption,
            "status" => $request->status,
        );

        Type::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.type');
    }

    public function deleteType($id){
        $del = Type::find($id);
        $del->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.type');
    }
}
