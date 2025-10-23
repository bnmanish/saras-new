<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DealershipEnquiry;

class DealershipEnquiryController extends Controller
{
    public function listEnquiries(){
        $data = DealershipEnquiry::orderBy('created_at', 'desc')->get();
        return view('backend/dealership_enquiry/list_dealership_enquiry')->with(['data' => $data]);
    }
}
