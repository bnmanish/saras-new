<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Session;
use File;

class BeneficiaryController extends Controller
{
    public function listBeneficiaries(){
        $data = Beneficiary::orderBy('created_at', 'desc')->get();
        return view('backend/beneficiaries/list_beneficiaries')->with(['data' => $data]);
    }

    public function addBeneficiary(){
        return view('backend/beneficiaries/add_beneficiary');
    }

    public function storeBeneficiary(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date_format:d-m-Y',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/beneficiaries'), $filename);
            $filePath = $filename;
        }

        Beneficiary::create([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Beneficiary added successfully!');
        return redirect()->route('admin.list.beneficiaries');
    }

    public function editBeneficiary($id){
        $data = Beneficiary::findOrFail($id);
        return view('backend/beneficiaries/edit_beneficiary', compact('data'));
    }

    public function updateBeneficiary(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'publish_date' => 'required|date_format:d-m-Y',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $beneficiary = Beneficiary::findOrFail($id);

        $filePath = $beneficiary->file;
        if ($request->hasFile('file')) {
            // Delete old file
            if ($filePath && File::exists(public_path('uploads/beneficiaries/' . $filePath))) {
                File::delete(public_path('uploads/beneficiaries/' . $filePath));
            }
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/beneficiaries'), $filename);
            $filePath = $filename;
        }

        $beneficiary->update([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        Session::flash('success', 'Beneficiary updated successfully!');
        return redirect()->route('admin.list.beneficiaries');
    }

    public function deleteBeneficiary($id){
        $beneficiary = Beneficiary::findOrFail($id);

        // Delete file
        if ($beneficiary->file && File::exists(public_path('uploads/beneficiaries/' . $beneficiary->file))) {
            File::delete(public_path('uploads/beneficiaries/' . $beneficiary->file));
        }

        $beneficiary->delete();

        Session::flash('success', 'Beneficiary deleted successfully!');
        return redirect()->route('admin.list.beneficiaries');
    }
}