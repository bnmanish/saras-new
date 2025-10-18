<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Session;

class SubscriberController extends Controller
{
    public function listSubscriber(){
        $data = Subscriber::orderBy('created_at','DESC')->get();
        return view('backend/subscriber/list_subscriber')->with(['data'=>$data]);
    }

    public function deleteSubscriber($id){
        Subscriber::where('id',$id)->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->back();
    }
}
