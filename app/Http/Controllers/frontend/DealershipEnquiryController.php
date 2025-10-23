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
}
