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
            'message' => 'required',
        ]);

        $emailData = array(
            "name" => $request->name,
            "projectName" => $request->projectName ?? "",
            "mobile" => $request->phone,
            "email" => $request->email,
            "subject" => "Rever Edge : Contact Enquiry - ".$request->projectName ?? "",
            "description" => $request->message,
        );


        $input = array (
        'rep_id' => $emailData['email'],
        'channel_id' => 'Contact Us',
        'subject' => $emailData['subject'],
        'f_name' => $emailData['name'],
        'l_name' => '',
        'email' => $emailData['email'],
        'phonefax' => $emailData['mobile'],
        'notes' => $emailData['description'],
        'project' => 'Rever Edge API',
        'alert_client' => 0,
        'alert_rep' => 0);

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


        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "X-API-KEY: $api_key",
                "ACTION-ON: $app_name",
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
            curl_setopt($ch, CURLOPT_USERPWD, $api_key);
            $data_resp = curl_exec($ch);
            
            if (curl_errno($ch)) {
                throw new \Exception('CURL Error: ' . curl_error($ch));
            }

            curl_close($ch);
        } catch (\Exception $e) {
            Log::error("API Error: " . $e->getMessage());
        }

        Session::flash('success','Thanks for contacting with us. We wll be back soon!');
        return redirect()->back();


    }
}
