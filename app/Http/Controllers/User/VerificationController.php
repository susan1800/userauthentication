<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Auth;
use mail;
use Hash;
class VerificationController extends Controller
{
    public function sendotp($email){
        
        $otp=mt_rand(100000, 999999);
        $details = [
            'title' => 'Localhost',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        \Mail::to($email)->send(new \App\Mail\mailotp($details));
        $hashcode =Crypt::encryptString($otp);
        $hashmail = Crypt::encryptString($email);
        return redirect()->route('verifyotp',['makeotp' => $hashcode , 'email'=> $hashmail]);
    }


    public function checkotp(Request $request){
        $this->validate($request, [
            'email'    =>  'required',
            'otp' =>  'required',
            'inputotp' =>  'required',
        ]);
        if($request->inputotp == Crypt::decryptString($request->otp)){
            $users = User::where('email' , '=' , Crypt::decryptString($request->email))->get();
            $user =User::find($users[0]->id);
            $user['email_verified_at'] = Carbon::now()->toDateTimeString(); 
            $user->save();
            if($user){

                $returncheckrole = $this->checkrole($users[0]->auth_id);

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
            else{
                return redirect()->route('verifyotp',['makeotp' => $request->otp , 'email'=> $request->email]);
            }
        }
        else{
            return redirect()->route('verifyotp',['makeotp' => $request->otp , 'email'=> $request->email]);
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
