<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdditionalPage;
use Session;

class AdditionalPageController extends Controller
{
    public function addPage(){
        return view('backend/page/additional/add_page');
    }

    public function stroePage(Request $request){

        // return $request->all();

        $request->validate([
            'title' => ['required', 'max:255', \Illuminate\Validation\Rule::unique('additional_pages', 'title')],
            'slug' => ['required', 'max:255', \Illuminate\Validation\Rule::unique('additional_pages', 'slug')],
            'meta_title' => ['nullable', 'max:255'],
            'meta_keywords' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:255'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required'],
            'file' => ['nullable', 'image'],
        ]);

        $img = $request->file('file');

        $cat = new AdditionalPage;
        $cat->title = $request->title;
        $cat->slug = $request->slug;
        $cat->meta_title = $request->meta_title;
        $cat->meta_keywords = $request->meta_keywords;
        $cat->meta_description = $request->meta_description;
        $cat->description = $request->desciption;
        $cat->scripts = $request->scripts;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/page/additional'),$imgname);
            $cat->image = $imgname;
        }
        $cat->status = $request->status;
        $cat->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.additional.page');
    }

    public function listPage(){
        $data = AdditionalPage::select('id','title','image','status')->orderBy('id','asc')->get();
        return view('backend/page/additional/list_page')->with(['data'=>$data]);
    }

    public function editPage(Request $request,$id){
        $data = AdditionalPage::where('id',$id)->first();
        return view('backend/page/additional/edit_page')->with(['data'=>$data]);
    }

    public function editStorePage(Request $request,$id){
        $request->validate([
            'title' => ['required', 'max:255', \Illuminate\Validation\Rule::unique('additional_pages', 'title')->ignore($id)],
            'slug' => ['required', 'max:255', \Illuminate\Validation\Rule::unique('additional_pages', 'slug')->ignore($id)],
            'meta_title' => ['nullable', 'max:255'],
            'meta_keywords' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:255'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required'],
            'file' => ['nullable', 'image'],
        ]);

        $img = $request->file('file');

        if($img){
            $old = AdditionalPage::find($id);
            if(is_file(base_path('public/uploads/page/additional/'.$old->image))){
                unlink(base_path('public/uploads/page/additional/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/page/additional'),$imgname);
            $data = array(
                "title" => $request->title,
                "slug" => $request->slug,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "description" => $request->desciption,
                "scripts" => $request->scripts,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "slug" => $request->slug,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "description" => $request->desciption,
                "scripts" => $request->scripts,
                "status" => $request->status,
            );
        }
        AdditionalPage::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.additional.page');
    }

    public function deletePage($id){
        $old = AdditionalPage::find($id);
        if(is_file(base_path('public/uploads/page/additional/'.$old->image))){
            unlink(base_path('public/uploads/page/additional/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.additional.page');
    }
}
