<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function addPage(){
        return view('backend/page/add_page');
    }

    public function stroePage(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('pages', 'title')],
            'status' => ['required', 'in:0,1'],
            'file' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
        ]);

        $img = $request->file('file');

        $cat = new Page;
        $cat->title = $request->title;
        $cat->meta_title = $request->meta_title;
        $cat->meta_keywords = $request->meta_keywords;
        $cat->meta_description = $request->meta_description;
        $cat->short_description = $request->short_description;
        $cat->description = $request->desciption;
        $cat->scripts = $request->scripts;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/page'),$imgname);
            $cat->image = $imgname;
        }
        $cat->status = $request->status;
        $cat->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.page');
    }

    public function listPage(){
        $data = Page::select('id','title','image','status')->orderBy('id','asc')->get();
        return view('backend/page/list_page')->with(['data'=>$data]);
    }

    public function editPage(Request $request,$id){
        $data = Page::where('id',$id)->first();
        return view('backend/page/edit_page')->with(['data'=>$data]);
    }

    public function editStorePage(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('pages', 'title')->ignore($id)],
            'status' => ['required', 'in:0,1'],
            'file' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
        ]);

        $img = $request->file('file');

        if($img){
            $old = Page::find($id);
            if(is_file(base_path('public/uploads/page/'.$old->image))){
                unlink(base_path('public/uploads/page/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/page'),$imgname);
            $data = array(
                "title" => $request->title,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "short_description" => $request->short_description,
                "description" => $request->desciption,
                "scripts" => $request->scripts,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "short_description" => $request->short_description,
                "description" => $request->desciption,
                "scripts" => $request->scripts,
                "status" => $request->status,
            );
        }
        Page::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.page');
    }

    public function deletePage($id){
        $old = Page::find($id);
        if(is_file(base_path('public/uploads/page/'.$old->image))){
            unlink(base_path('public/uploads/page/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.page');
    }
}
