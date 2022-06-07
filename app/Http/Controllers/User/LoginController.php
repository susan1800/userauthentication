<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auth;
use App\Models\PaymentStatus;
use Hash;

class LoginController extends BaseController
{
    public function login(Request $request){

        $this->validate($request, [
            'email'    =>  'required',
            'password' =>  'required',
        ]);

        $user =User::where('email' , '=' , $request->email)->get();

        if(sizeof($user) < 1){
            return $this->responseRedirectBack('Email not found Please refister first.', 'error', true, true);
        }

        else{

            $returncheckpassword = $this->checkpassword($request->password , $user[0]->password);

            if($returncheckpassword == false){
                return $this->responseRedirectBack('Password not matched , Please enter valid password.', 'error', true, true);
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

                // echo "user is user";
                $returnPaymentStatus = $this->checkPaymentStatus($user[0]->roll_no);
                if($returnPaymentStatus == true){
                    $request->session()->put('testuserlogin','yes');
                    return redirect()->route('user' );
                }
                else{
                    return $this->responseRedirectBack('Payment Not Cleared , Please Contact To the Administrator.', 'error', true, true);
                }

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






    private function checkverify($verified_at , $email){
        if($verified_at == null){

            // return redirect()->route('sendotp' ,compact('email'));
            return false;
        }
        else{
            return true;
        }
    }




    private function checkrole($auth_id){
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

    private function checkPaymentStatus($roll_no){
        $status = PaymentStatus::where('roll_no' , $roll_no)->get();
        if($status[0]->status == 1){
            return true;
        }
        else{
            return false;
        }
    }




}

