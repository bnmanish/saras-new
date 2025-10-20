<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('status', '1')->get();
        return view('backend/product/add_product', compact('categories'));
    }

    public function storeProduct(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:0,1'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        $product = new Product;
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/product'),$imgname);
            $product->image = $imgname;
        }
        $product->status = $request->status;
        $product->save();

        Session::flash('success','Product added successfully!');
        return redirect()->route('admin.list.product');
    }

    public function listProduct(){
        $data = Product::with('category')->select('id','title','category_id','image','status')->orderBy('id','asc')->get();
        return view('backend/product/list_product')->with(['data'=>$data]);
    }

    public function editProduct(Request $request,$id){
        $data = Product::where('id',$id)->first();
        $categories = Category::where('status', '1')->get();
        return view('backend/product/edit_product', compact('data', 'categories'));
    }

    public function editStoreProduct(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:0,1'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $img = $request->file('image');

        if($img){
            $old = Product::find($id);
            if(is_file(base_path('public/uploads/product/'.$old->image))){
                unlink(base_path('public/uploads/product/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/product'),$imgname);
            $data = array(
                "title" => $request->title,
                "category_id" => $request->category_id,
                "image" => $imgname,
                "status" => $request->status,
            );
        }else{
            $data = array(
                "title" => $request->title,
                "category_id" => $request->category_id,
                "status" => $request->status,
            );
        }
        Product::where('id',$id)->update($data);
        Session::flash('success','Product updated successfully!');
        return redirect()->route('admin.list.product');
    }

    public function deleteProduct($id){
        $old = Product::find($id);
        if(is_file(base_path('public/uploads/product/'.$old->image))){
            unlink(base_path('public/uploads/product/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Product deleted successfully!');
        return redirect()->route('admin.list.product');
    }
}