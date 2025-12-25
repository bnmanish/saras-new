<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSection;
use App\Models\FooterLink;
use Session;

class FooterController extends Controller
{
    // Footer Sections Management
    public function addSection(){
        return view('backend/footer/add_section');
    }

    public function storeSection(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        FooterSection::create([
            'name' => $request->name,
            'status' => $request->status,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        Session::flash('success','Section added successfully!');
        return redirect()->route('admin.list.footer.sections');
    }

    public function listSections(){
        $data = FooterSection::orderBy('sort_order','asc')->orderBy('id','asc')->get();
        return view('backend/footer/list_sections')->with(['data'=>$data]);
    }

    public function editSection($id){
        $data = FooterSection::findOrFail($id);
        return view('backend/footer/edit_section')->with(['data'=>$data]);
    }

    public function updateSection(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        FooterSection::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        Session::flash('success','Section updated successfully!');
        return redirect()->route('admin.list.footer.sections');
    }

    public function deleteSection($id){
        FooterSection::findOrFail($id)->delete();
        Session::flash('success','Section deleted successfully!');
        return redirect()->route('admin.list.footer.sections');
    }

    // Footer Links Management
    public function addLink(){
        $sections = FooterSection::where('status', '1')->get();
        return view('backend/footer/add_link')->with(['sections'=>$sections]);
    }

    public function storeLink(Request $request){
        $request->validate([
            'section_id' => ['required', 'exists:footer_sections,id'],
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'target' => ['required', 'in:_self,_blank'],
            'status' => ['required', 'in:0,1'],
        ]);

        FooterLink::create([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'url' => $request->url,
            'target' => $request->target,
            'status' => $request->status,
        ]);

        Session::flash('success','Link added successfully!');
        return redirect()->route('admin.list.footer.links');
    }

    public function listLinks(){
        $data = FooterLink::with('section')->orderBy('id','asc')->get();
        return view('backend/footer/list_links')->with(['data'=>$data]);
    }

    public function editLink($id){
        $data = FooterLink::findOrFail($id);
        $sections = FooterSection::where('status', '1')->get();
        return view('backend/footer/edit_link')->with(['data'=>$data, 'sections'=>$sections]);
    }

    public function updateLink(Request $request, $id){
        $request->validate([
            'section_id' => ['required', 'exists:footer_sections,id'],
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'target' => ['required', 'in:_self,_blank'],
            'status' => ['required', 'in:0,1'],
        ]);

        FooterLink::where('id', $id)->update([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'url' => $request->url,
            'target' => $request->target,
            'status' => $request->status,
        ]);

        Session::flash('success','Link updated successfully!');
        return redirect()->route('admin.list.footer.links');
    }

    public function deleteLink($id){
        FooterLink::findOrFail($id)->delete();
        Session::flash('success','Link deleted successfully!');
        return redirect()->route('admin.list.footer.links');
    }
}