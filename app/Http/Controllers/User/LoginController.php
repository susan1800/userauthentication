<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auth;
use Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        
        $this->validate($request, [
            'email'    =>  'required',
            'password' =>  'required',
        ]);
       
        $user =User::where('email' , '=' , $request->email)->get();
        
        if(sizeof($user) < 1){
            return view('login.signup');
        }
        
        else{

            $returncheckpassword = $this->checkpassword($request->password , $user[0]->password);

            if($returncheckpassword == false){
                return redirect()->route('signin');
            }


               $returbverify =  $this->checkverify($user[0]->email_verified_at , $user[0]->email);
               if($returbverify == false){
                   $email = $user[0]->email;
                return redirect()->route('sendotp' ,$email);
               }




              
               $returncheckrole = $this->checkrole($user[0]->auth_id);

               if($returncheckrole == true){
                $request->session()->put('testadminlogin','yes');
                // echo "user is admin";
                return redirect()->route('admin' );
               }
               else{
                $request->session()->put('testuserlogin','yes');
                // echo "user is user";
                return redirect()->route('user' );
            }
            
    }
}


        private function checkpassword($inputpassword , $password){
        if(Hash::check($inputpassword, $password)){

            return true;
        }
        else{
            // $name="fghb";
            // return view('login.signin',compact('name'));

            // return redirect()->route('signin' ,compact('name'));
            return false;
        }
    }






    public function checkverify($verified_at , $email){
        if($verified_at == null){
            
            // return redirect()->route('sendotp' ,compact('email'));
            return false;
        }
        else{
            return true;
        }
    }




    public function checkrole($auth_id){
        $auth = Auth::where('id' , '=' , $auth_id)->get();
                if($auth[0]->title=="admin"){
                    // echo "user is admin";
                    return true;
                }
                else{
                    // echo "user is user";
                    return false;
                }
    }




}

