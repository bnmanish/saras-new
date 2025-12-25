<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('backend/category/add_category');
    }

    public function storeCategory(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug'],
            'icon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['required', 'in:0,1'],
        ]);

        $slug = $request->slug ?: Str::slug($request->title);
        $request->merge(['slug' => $slug]);

        // Re-validate slug uniqueness after setting
        $request->validate([
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->status = $request->status;

        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $iconName = time().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/category_icons'), $iconName);
            $category->icon = $iconName;
        }

        $category->save();

        Session::flash('success','Category added successfully!');
        return redirect()->route('admin.list.category');
    }

    public function listCategory(){
        $data = Category::select('id','title','slug','icon','status')->orderBy('id','asc')->get();
        return view('backend/category/list_category')->with(['data'=>$data]);
    }

    public function editCategory(Request $request,$id){
        $data = Category::where('id',$id)->first();
        return view('backend/category/edit_category')->with(['data'=>$data]);
    }

    public function editStoreCategory(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug,'.$id],
            'icon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['required', 'in:0,1'],
        ]);

        $slug = $request->slug ?: Str::slug($request->title);
        $request->merge(['slug' => $slug]);

        // Re-validate slug uniqueness after setting
        $request->validate([
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug,'.$id],
        ]);

        $data = array(
            "title" => $request->title,
            "slug" => $request->slug,
            "status" => $request->status,
        );

        if($request->hasFile('icon')){
            $oldCategory = Category::find($id);
            if($oldCategory->icon && file_exists(public_path('uploads/category_icons/'.$oldCategory->icon))){
                unlink(public_path('uploads/category_icons/'.$oldCategory->icon));
            }

            $icon = $request->file('icon');
            $iconName = time().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/category_icons'), $iconName);
            $data['icon'] = $iconName;
        }

        Category::where('id',$id)->update($data);
        Session::flash('success','Category updated successfully!');
        return redirect()->route('admin.list.category');
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if($category->icon && file_exists(public_path('uploads/category_icons/'.$category->icon))){
            unlink(public_path('uploads/category_icons/'.$category->icon));
        }
        $category->delete();
        Session::flash('success','Category deleted successfully!');
        return redirect()->route('admin.list.category');
    }
}