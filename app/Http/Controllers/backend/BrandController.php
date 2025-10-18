<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{
    public function addBrand(){
        return view('backend/brand/add_brand');
    }

    public function stroeBrand(Request $request){

        $this->validate($request,[
            'title' => 'required|unique:brands|max:255',
            'url' => 'unique:brands|max:255',
            'sequence' => 'numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
            'image' => 'required|image',
        ]);

        $img = $request->file('image');

        $brand = new Brand;
        $brand->title = $request->title;
        $brand->sequence = $request->sequence;
        $brand->url = $request->url;
        $brand->meta_title = $request->meta_title;
        $brand->meta_keywords = $request->meta_keywords;
        $brand->meta_description = $request->meta_description;
        $brand->short_description = $request->short_description;
        $brand->description = $request->desciption;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/brand'),$imgname);
            $brand->image = $imgname;
        }
        $brand->status = $request->status;
        $brand->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.brand');
    }

    public function listBrand(){
        $data = Brand::select('id','title','sequence','image','status')->orderBy('id','asc')->get();
        return view('backend/brand/list_brand')->with(['data'=>$data]);
    }

    public function editBrand(Request $request,$id){
        $data = Brand::where('id',$id)->first();
        return view('backend/brand/edit_brand')->with(['data'=>$data]);
    }

    public function editStoreBrand(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:255|unique:brands,title,'.$id,
            'url' => 'required|max:255|unique:brands,title,'.$id,
            'sequence' => 'nullable|numeric',
            'meta_title' => 'max:1000',
            'meta_keywords' => 'max:1000',
            'meta_description' => 'max:1000',
            'status' => 'required',
            'image' => 'nullable|image',
        ]);

        $img = $request->file('image');

        if($img){
            $old = Brand::find($id);
            if(is_file(base_path('public/uploads/brand/'.$old->image))){
                unlink(base_path('public/uploads/brand/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/brand'),$imgname);
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
        Brand::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.brand');
    }

    public function deleteBrand($id){
        $old = Brand::find($id);
        if(is_file(base_path('public/uploads/brand/'.$old->image))){
            unlink(base_path('public/uploads/brand/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.brand');
    }
}
