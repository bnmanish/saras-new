<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('backend/category/add_category');
    }

    public function storeCategory(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        Session::flash('success','Category added successfully!');
        return redirect()->route('admin.list.category');
    }

    public function listCategory(){
        $data = Category::select('id','name','status')->orderBy('id','asc')->get();
        return view('backend/category/list_category')->with(['data'=>$data]);
    }

    public function editCategory(Request $request,$id){
        $data = Category::where('id',$id)->first();
        return view('backend/category/edit_category')->with(['data'=>$data]);
    }

    public function editStoreCategory(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
        ]);

        $data = array(
            "name" => $request->name,
            "status" => $request->status,
        );
        Category::where('id',$id)->update($data);
        Session::flash('success','Category updated successfully!');
        return redirect()->route('admin.list.category');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        Session::flash('success','Category deleted successfully!');
        return redirect()->route('admin.list.category');
    }
}