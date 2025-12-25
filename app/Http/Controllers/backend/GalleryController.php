<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;
use Session;

class GalleryController extends Controller
{
    public function addGallery(){
        $categories = GalleryCategory::orderBy('name')->get();
        return view('backend/gallery/add_gallery', compact('categories'));
    }

    public function storeGallery(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:gallery_categories,id'],
            'images' => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->save();

        if($request->hasFile('images')){
            $order = 1;
            foreach($request->file('images') as $image){
                $imgname = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(base_path('public/uploads/gallery'), $imgname);
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image' => $imgname,
                    'order' => $order,
                ]);
                $order++;
            }
        }

        Session::flash('success','Gallery added successfully!');
        return redirect()->route('admin.list.gallery');
    }

    public function listGallery(){
        $data = Gallery::with('images', 'category')->orderBy('created_at','desc')->get();
        return view('backend/gallery/list_gallery')->with(['data'=>$data]);
    }

    public function editGallery($id){
        $data = Gallery::with('images')->where('id',$id)->first();
        $categories = GalleryCategory::orderBy('name')->get();
        return view('backend/gallery/edit_gallery', compact('data', 'categories'));
    }

    public function editStoreGallery(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:gallery_categories,id'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->save();

        if($request->hasFile('images')){
            $maxOrder = GalleryImage::where('gallery_id', $id)->max('order') ?? 0;
            $order = $maxOrder + 1;
            foreach($request->file('images') as $image){
                $imgname = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(base_path('public/uploads/gallery'), $imgname);
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image' => $imgname,
                    'order' => $order,
                ]);
                $order++;
            }
        }

        Session::flash('success','Gallery updated successfully!');
        return redirect()->route('admin.list.gallery');
    }

    public function deleteGallery($id){
        $gallery = Gallery::find($id);
        foreach($gallery->images as $img){
            if(is_file(base_path('public/uploads/gallery/'.$img->image))){
                unlink(base_path('public/uploads/gallery/'.$img->image));
            }
            $img->delete();
        }
        $gallery->delete();
        Session::flash('success','Gallery deleted successfully!');
        return redirect()->route('admin.list.gallery');
    }

    public function deleteGalleryImage($id){
        $image = GalleryImage::find($id);
        if(is_file(base_path('public/uploads/gallery/'.$image->image))){
            unlink(base_path('public/uploads/gallery/'.$image->image));
        }
        $image->delete();
        return response()->json(['success' => true]);
    }

    public function reorderGalleryImages(Request $request){
        $order = $request->order;
        foreach($order as $index => $id){
            GalleryImage::where('id', $id)->update(['order' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }
}