<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;



class BlogController extends Controller
{
    public function addBlog(){
        $blogCategories = BlogCategory::where('status', 'active')->get();
        return view('backend/blog/add_blog', compact('blogCategories'));
    }

    public function listBlog(){
        $qry = Blog::select('blogs.id','blogs.title','blogs.banner','blogs.status','blog_categories.title as category','users.name','blogs.created_at')->leftJoin('users', 'blogs.user_id', '=', 'users.id')->leftJoin('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')->orderBy('blogs.title');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/blog/list_blog')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getlistData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Blog::count();
        $data = Blog::select('blogs.id','blogs.title','blogs.banner','blogs.status','blog_categories.title as category','users.name','blogs.created_at')->leftJoin('users', 'blogs.user_id', '=', 'users.id')->leftJoin('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('blogs.title',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('categories.title',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('users.name',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('blogs.status',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('blogs.created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('blogs.title','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();
        $filterdtotal = $searchkey ? count($data) : $total;
        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->title;
            $fdata[$key][] = "<img width='100' src='".url('uploads/blog/'.$dataRow->banner)."'>";
            $fdata[$key][] = $dataRow->category ?? 'N/A';
            $fdata[$key][] = $dataRow->name ?? 'N/A';
            $fdata[$key][] = $dataRow->status == '1' ? 'Enable' : 'Disable';
            $fdata[$key][] = "<span data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='".date('d F, Y',strtotime($dataRow->created_at))."'>".date('d-m-Y',strtotime($dataRow->created_at))."</span>";
            $fdata[$key][] = "<a href=".route('admin.edit.blog',$dataRow->id)." class='btn btn-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='fas fa-edit'></i></a>&nbsp;<a href=".route('admin.delete.blog',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?') data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='fas fa-trash'></i></a>";
            $sl = $sl+1;
        }

        $dataArr = array(
            'draw'  => $draw,
            'recordsTotal'  =>$total,
            'recordsFiltered'  => $filterdtotal,
            'data'  => $fdata,
        );

        return response()->json($dataArr);
    }

    public function storeBlog(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required|max:255|unique:blogs,title',
            'slug' => 'required|max:255|unique:blogs,slug',
            'meta_title' => 'max:255',
            'short_description' => 'required',
            'description' => 'required',
            'banner' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }
        $blog = new Blog();
        $blog->blog_category_id = $request->category;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->scripts = $request->scripts;
        $blog->user_id = Auth::user()->id;
        $banner = $request->file('banner');
        if($banner){
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/blog'),$banner_name);
            $blog->banner = $banner_name;
        }
        $blog->trending = $request->trending == 'on' ? '1' : '0';
        $blog->latest = $request->latest == 'on' ? '1' : '0';
        $blog->featured = $request->featured == 'on' ? '1' : '0';
        $blog->popular = $request->popular == 'on' ? '1' : '0';
        $blog->other = $request->other == 'on' ? '1' : '0';
        $blog->status = $request->status == 'on' ? '1' : '0';
        $blog->save();
        Session::flash('success','Added successfully!');
        return response()->json(array('status'=>true,'message'=>'blog added successfully!'));
    }

    public function editBlog($id){
        $data = Blog::where('id',$id)->first();
        $blogCategories = BlogCategory::where('status', 'active')->get();
        return view('backend/blog/edit_blog', compact('data', 'blogCategories'));
    }

    public function editStoreBlog(Request $request,$id){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:blogs,title,'.$id,
            'slug' => 'required|max:255|unique:blogs,slug,'.$id,
            'meta_title' => 'max:255',
            'banner' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        $data = array(
            "blog_category_id" => $request->category,
            "title" => $request->title,
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "scripts" => $request->scripts,
            "trending" => $request->trending == 'on' ? '1' : '0',
            "latest" => $request->latest == 'on' ? '1' : '0',
            "featured" => $request->featured == 'on' ? '1' : '0',
            "popular" => $request->popular == 'on' ? '1' : '0',
            "other" => $request->other == 'on' ? '1' : '0',
            "status" => $request->status == 'on' ? '1' : '0',
        );

        $banner = $request->file('banner');
        if($banner){
            $oldimg = blog::find($id);
            if(is_file(public_path('uploads/blog/'.$oldimg->banner))){
                unlink(public_path('uploads/blog/'.$oldimg->banner));
            }
            
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/blog'),$banner_name);
            $data_img = array('banner' => $banner_name);
            $data = array_merge($data,$data_img);
        }
        Blog::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return response()->json(array('status'=>true,'message'=>'Blog updated successfully!'));

    }

    public function deleteBlog($id){
        $data = Blog::find($id);
        if(is_file(public_path('uploads/blog/'.$data->banner))){
            unlink(public_path('uploads/blog/'.$data->banner));
        }
        $data->delete();
        Session::flash('success','Blog Deleted successfully.');
        return redirect()->back();

    }
}
