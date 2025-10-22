<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantLink;
use Session;

class ImportantLinkController extends Controller
{
    public function addImportantLink(){
        return view('backend/important_link/add_important_link');
    }

    public function storeImportantLink(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'url'],
        ]);

        $importantLink = new ImportantLink;
        $importantLink->title = $request->title;
        $importantLink->link = $request->link;
        $importantLink->save();

        Session::flash('success','Important Link added successfully!');
        return redirect()->route('admin.list.important_link');
    }

    public function listImportantLink(){
        $data = ImportantLink::orderBy('created_at','desc')->get();
        return view('backend/important_link/list_important_link')->with(['data'=>$data]);
    }

    public function editImportantLink($id){
        $data = ImportantLink::where('id',$id)->first();
        return view('backend/important_link/edit_important_link', compact('data'));
    }

    public function editStoreImportantLink(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'url'],
        ]);

        $data = array(
            "title" => $request->title,
            "link" => $request->link,
        );
        ImportantLink::where('id',$id)->update($data);
        Session::flash('success','Important Link updated successfully!');
        return redirect()->route('admin.list.important_link');
    }

    public function deleteImportantLink($id){
        ImportantLink::find($id)->delete();
        Session::flash('success','Important Link deleted successfully!');
        return redirect()->route('admin.list.important_link');
    }
}