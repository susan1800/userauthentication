<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function userlogout(){

        session()->forget('testuserlogin');
        
        return redirect()->route('signin');
    }
    public function adminlogout(){

        session()->forget('testadminlogin');
       
        return redirect()->route('signin');
    }
}
