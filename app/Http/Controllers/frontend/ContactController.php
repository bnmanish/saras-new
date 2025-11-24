<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

use App\Mail\ContactEnquiry;
use App\Models\ContactEnquiry as ContactEnq;
use Illuminate\Support\Facades\Validator;
use Exception;
use Mail;
use Illuminate\Support\Facades\Log;
use Session;

class ContactController extends Controller
{
    public function index(){
        $page = Page::where(['id'=>3])->first();
        return view('frontend/contact')->with(['page'=>$page]);
    }

    public function enquiry(Request $request){

        $this->validate($request,[
            'name' => 'required|max:50',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:50',
            'subject' => 'required|max|max:500',
            'message' => 'required',
        ]);

        $emailData = array(
            "name" => $request->name,
            "mobile" => $request->phone,
            "email" => $request->email,
            "subject" => $request->subject,
            "description" => $request->message,
        );

        $url = env('CONTACT_API_URL');
        $api_key=env('CONTACT_API_KEY');
        $app_name='AzxDw';


        $contactEnquiry = new ContactEnq($emailData);
        $contactEnquiry->save();

        try{
            Mail::to(env('CONTACT_ENQUIRY_TO_EMAIL'))->cc(env('CONTACT_ENQUIRY_TO_CC_EMAIL'))->send(new ContactEnquiry($emailData));
        }catch(\Exception $e){
            Log::error($e->getMessage().' : '.$e->getFile().'-'.$e->getLine());
        }

        Session::flash('success','Thanks for contacting with us. We wll be back soon!');
        return redirect()->back();


    }
}
