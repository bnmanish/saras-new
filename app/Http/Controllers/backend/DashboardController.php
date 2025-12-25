<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $user_count =  User::count();
        return view('backend/dashboard')->with(['user_count'=>$user_count]);
    }
}
