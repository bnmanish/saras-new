<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Carrier;

class CarrierController extends Controller
{
    public function listCarrier(){
        $data = Carrier::orderBy('created_at','desc')->get();
        return view('backend/carrier/list_carrier')->with(['data'=>$data]);
    }

    public function submitCarrierForm(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'position' => 'required|string|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        // Handle file upload
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/carrier_resumes'), $fileName);
            $resumePath = 'carrier_resumes/' . $fileName;
        }

        Carrier::create([
            'name' => $request->name,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'position' => $request->position,
            'resume' => $resumePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!'
        ]);
    }
}