<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactEnquiry;

class EnquiryController extends Controller
{
    public function contactEnquiry(){
        $data = ContactEnquiry::orderBy('created_at','desc')->get();
        return view('backend/enquiry/contact_enquiry')->with(['data'=>$data]);
    }
}
