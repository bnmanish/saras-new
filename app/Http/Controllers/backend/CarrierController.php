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
}