<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->select('id', 'name')->get();
        return view('backend/product/add_product', compact('categories', 'products'));
    }

    public function storeProduct(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['nullable', 'integer'],
            'pack_size' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'related_products' => ['nullable', 'array'],
            'related_products.*' => ['exists:products,id'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required', 'in:0,1'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->pack_size = $request->pack_size;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->related_products = $request->related_products;
        $product->scripts = $request->scripts;
        $product->status = $request->status;
        $product->save();

        // Handle images
        if($request->hasFile('images')){
            $images = $request->file('images');
            $isFirst = true;
            foreach($images as $img){
                $imgname = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
                $img->move(base_path('public/uploads/product'),$imgname);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imgname,
                    'is_primary' => $isFirst,
                ]);
                $isFirst = false;
            }
        }

        Session::flash('success','Product added successfully!');
        return redirect()->route('admin.list.product');
    }

    public function listProduct(){
        $data = Product::with('category', 'primaryImage')->select('id','name','category_id','price','pack_size','status')->orderBy('id','asc')->get();
        return view('backend/product/list_product')->with(['data'=>$data]);
    }

    public function editProduct(Request $request,$id){
        $data = Product::with('images')->where('id',$id)->first();
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->where('id', '!=', $id)->select('id', 'name')->get();
        return view('backend/product/edit_product', compact('data', 'categories', 'products'));
    }

    public function editStoreProduct(Request $request,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['nullable', 'integer'],
            'pack_size' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'related_products' => ['nullable', 'array'],
            'related_products.*' => ['exists:products,id'],
            'scripts' => ['nullable', 'string'],
            'status' => ['required', 'in:0,1'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->pack_size = $request->pack_size;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->related_products = $request->related_products;
        $product->scripts = $request->scripts;
        $product->status = $request->status;
        $product->save();

        // Handle new images
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $img){
                $imgname = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
                $img->move(base_path('public/uploads/product'),$imgname);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imgname,
                    'is_primary' => false, // new images are not primary by default
                ]);
            }
        }

        Session::flash('success','Product updated successfully!');
        return redirect()->route('admin.list.product');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        // Delete all images
        foreach($product->images as $image){
            if(is_file(base_path('public/uploads/product/'.$image->image))){
                unlink(base_path('public/uploads/product/'.$image->image));
            }
            $image->delete();
        }
        $product->delete();
        Session::flash('success','Product deleted successfully!');
        return redirect()->route('admin.list.product');
    }

    public function deleteProductImage($id){
        $image = ProductImage::find($id);
        if($image){
            if(is_file(base_path('public/uploads/product/'.$image->image))){
                unlink(base_path('public/uploads/product/'.$image->image));
            }
            $image->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}