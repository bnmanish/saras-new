<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Session;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function addBlogCategory(){
        return view('backend/blog_category/add_blog_category');
    }

    public function storeBlogCategory(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:blog_categories'],
            'slug' => ['required', 'string', 'max:255', 'unique:blog_categories'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $blogCategory = new BlogCategory;
        $blogCategory->title = $request->title;
        $blogCategory->slug = $request->slug;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->meta_keywords = $request->meta_keywords;
        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->description = $request->description;
        $blogCategory->scripts = $request->scripts;
        $blogCategory->status = $request->status;
        $blogCategory->save();

        Session::flash('success','Blog Category added successfully!');
        return redirect()->route('admin.list.blog_category');
    }

    public function listBlogCategory(){
        $data = BlogCategory::select('id','title','slug','status')->orderBy('id','asc')->get();
        return view('backend/blog_category/list_blog_category')->with(['data'=>$data]);
    }

    public function editBlogCategory(Request $request,$id){
        $data = BlogCategory::where('id',$id)->first();
        return view('backend/blog_category/edit_blog_category')->with(['data'=>$data]);
    }

    public function editStoreBlogCategory(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:blog_categories,title,'.$id],
            'slug' => ['required', 'string', 'max:255', 'unique:blog_categories,slug,'.$id],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $data = array(
            "title" => $request->title,
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
            "description" => $request->description,
            "scripts" => $request->scripts,
            "status" => $request->status,
        );
        BlogCategory::where('id',$id)->update($data);
        Session::flash('success','Blog Category updated successfully!');
        return redirect()->route('admin.list.blog_category');
    }

    public function deleteBlogCategory($id){
        BlogCategory::find($id)->delete();
        Session::flash('success','Blog Category deleted successfully!');
        return redirect()->route('admin.list.blog_category');
    }
}
