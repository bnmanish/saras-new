<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use Session;
use File;

class TenderController extends Controller
{
    public function listTenders(){
        $data = Tender::orderBy('created_at', 'desc')->get();
        return view('backend/tenders/list_tenders')->with(['data' => $data]);
    }

    public function addTender(){
        return view('backend/tenders/add_tender');
    }

    public function storeTender(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tenders'), $filename);
            $filePath = $filename;
        }

        Tender::create([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Tender added successfully!');
        return redirect()->route('admin.list.tenders');
    }

    public function editTender($id){
        $data = Tender::findOrFail($id);
        return view('backend/tenders/edit_tender', compact('data'));
    }

    public function updateTender(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $tender = Tender::findOrFail($id);

        $filePath = $tender->file;
        if ($request->hasFile('file')) {
            // Delete old file
            if ($filePath && File::exists(public_path('uploads/tenders/' . $filePath))) {
                File::delete(public_path('uploads/tenders/' . $filePath));
            }
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tenders'), $filename);
            $filePath = $filename;
        }

        $tender->update([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Tender updated successfully!');
        return redirect()->route('admin.list.tenders');
    }

    public function deleteTender($id){
        $tender = Tender::findOrFail($id);

        // Delete file
        if ($tender->file && File::exists(public_path('uploads/tenders/' . $tender->file))) {
            File::delete(public_path('uploads/tenders/' . $tender->file));
        }

        $tender->delete();

        Session::flash('success', 'Tender deleted successfully!');
        return redirect()->route('admin.list.tenders');
    }
}
