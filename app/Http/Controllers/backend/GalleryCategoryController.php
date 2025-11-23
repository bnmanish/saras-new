<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Session;

class GalleryCategoryController extends Controller
{
    public function addGalleryCategory(){
        return view('backend/gallery_category/add_gallery_category');
    }

    public function storeGalleryCategory(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:gallery_categories,name'],
            'status' => ['required', 'in:0,1'],
        ]);

        GalleryCategory::create($request->only('name', 'status'));

        Session::flash('success','Gallery Category added successfully!');
        return redirect()->route('admin.list.gallery_category');
    }

    public function listGalleryCategory(){
        $data = GalleryCategory::orderBy('created_at','desc')->get();
        return view('backend/gallery_category/list_gallery_category')->with(['data'=>$data]);
    }

    public function editGalleryCategory($id){
        $data = GalleryCategory::where('id',$id)->first();
        return view('backend/gallery_category/edit_gallery_category', compact('data'));
    }

    public function editStoreGalleryCategory(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:gallery_categories,name,'.$id],
            'status' => ['required', 'in:0,1'],
        ]);

        GalleryCategory::where('id',$id)->update($request->only('name', 'status'));
        Session::flash('success','Gallery Category updated successfully!');
        return redirect()->route('admin.list.gallery_category');
    }

    public function deleteGalleryCategory($id){
        GalleryCategory::find($id)->delete();
        Session::flash('success','Gallery Category deleted successfully!');
        return redirect()->route('admin.list.gallery_category');
    }
}