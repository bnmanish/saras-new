<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\LoginLogService;

class LoginController extends Controller
{
    protected $loginLogService;

    public function __construct(LoginLogService $loginLogService)
    {
        $this->loginLogService = $loginLogService;
    }
    
    public function login(){
        return view('backend/login');
    }

    public function logedin(Request $request){
        $request->validate([
            'user_name' => 'required|max:50',
            'password'  => 'required',
        ]);

        $uname = $request->user_name;
        $password = $request->password;
        $ipAddress = $request->ip();

        // Try login with email first
        if (Auth::attempt(['email' => $uname, 'password' => $password, 'status' => '1'])) {
            $this->loginLogService->logSuccessfulLogin(Auth::user(), $ipAddress);
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }
        // Try login with username
        else if(Auth::attempt(['user_name' => $uname, 'password' => $password, 'status' => '1'])){
            $this->loginLogService->logSuccessfulLogin(Auth::user(), $ipAddress);
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }
        // Login failed - log the failed attempt
        else{
            $this->loginLogService->logFailedLogin($uname, $ipAddress);
            Session::flash('error','Wrong Credentials!');
            return redirect()->back();
        }
    }

    public function adminLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
