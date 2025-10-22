<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaPress;
use Session;

class MediaPressController extends Controller
{
    public function addMediaPress(){
        return view('backend/media_press/add_media_press');
    }

    public function storeMediaPress(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'pdf_or_link' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        $mediaPress = new MediaPress;
        $mediaPress->title = $request->title;
        $mediaPress->short_description = $request->short_description;
        $mediaPress->pdf_or_link = $request->pdf_or_link;
        $mediaPress->date = $request->date;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/media_press'),$imgname);
            $mediaPress->image = $imgname;
        }
        $mediaPress->save();

        Session::flash('success','Media/Press added successfully!');
        return redirect()->route('admin.list.media_press');
    }

    public function listMediaPress(){
        $data = MediaPress::orderBy('date','desc')->get();
        return view('backend/media_press/list_media_press')->with(['data'=>$data]);
    }

    public function editMediaPress($id){
        $data = MediaPress::where('id',$id)->first();
        return view('backend/media_press/edit_media_press', compact('data'));
    }

    public function editStoreMediaPress(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'pdf_or_link' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = MediaPress::find($id);
            if(is_file(base_path('public/uploads/media_press/'.$old->image))){
                unlink(base_path('public/uploads/media_press/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/media_press'),$imgname);
            $data = array(
                "title" => $request->title,
                "short_description" => $request->short_description,
                "pdf_or_link" => $request->pdf_or_link,
                "date" => $request->date,
                "image" => $imgname,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "short_description" => $request->short_description,
                "pdf_or_link" => $request->pdf_or_link,
                "date" => $request->date,
            );
        }
        MediaPress::where('id',$id)->update($data);
        Session::flash('success','Media/Press updated successfully!');
        return redirect()->route('admin.list.media_press');
    }

    public function deleteMediaPress($id){
        $old = MediaPress::find($id);
        if(is_file(base_path('public/uploads/media_press/'.$old->image))){
            unlink(base_path('public/uploads/media_press/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Media/Press deleted successfully!');
        return redirect()->route('admin.list.media_press');
    }
}