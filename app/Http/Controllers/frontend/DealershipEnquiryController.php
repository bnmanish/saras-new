<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DealershipEnquiry;
use Session;

class DealershipEnquiryController extends Controller
{
    public function showForm(){
        return view('frontend/dealership_enquiry');
    }

    public function submitForm(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'business_name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pin_code' => 'required|string|max:10',
            'type_of_business' => 'required|in:retailer,wholesaler,distributor',
            'approx_daily_requirement' => 'required|string|max:255',
            'additional_notes' => 'nullable|string',
            'agree_terms' => 'required|accepted',
        ]);

        DealershipEnquiry::create($request->all());

        Session::flash('success', 'Your dealership enquiry has been submitted successfully!');
        return redirect()->back();
    }

    public function submitDistributorForm(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'business_type' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Split name into first_name and last_name
        $nameParts = explode(' ', $request->name, 2);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

        // Normalize business type to match enum values
        $businessType = strtolower($request->business_type);
        if (!in_array($businessType, ['retailer', 'wholesaler', 'distributor'])) {
            $businessType = 'distributor'; // Default to distributor if not matching
        }

        DealershipEnquiry::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $request->email,
            'phone' => $request->mobile,
            'city' => $request->city,
            'type_of_business' => $businessType,
            'business_name' => 'N/A',
            'business_address' => 'N/A',
            'state' => 'N/A',
            'pin_code' => 'N/A',
            'approx_daily_requirement' => 'N/A',
            'additional_notes' => null,
            'agree_terms' => true,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Enquiry submitted successfully!'
        ]);
    }
}
