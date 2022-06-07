<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Auth;
use App\Models\User;
use Hash;

class RegisterController extends BaseController
{
    public function register(Request $request){

        $this->validate($request, [
            'name'      =>  'required|max:191',
            'email'    =>  'required|email',
            'phone'    =>  'required|digits:10',
            'password' =>  'required|min:6',

        ]);
        $pieces = explode("@", $request->email);
        if($pieces['1'] == "cosmoscollege.edu.np"){

        $user =User::where('email' , '=' , $request->email)->get();
        if(sizeof($user) > 0){
            return $this->responseRedirect('signin', 'Account already registered ! Please login' ,'success',false, false);
            // return redirect()->route('signin');
        }

        $roll = str_split($request->email);
        $roll_no = "";
        for($i=0;$i<6;$i++){
            $roll_no = $roll_no.$roll[$i];
        }

        $auth = Auth::where('title' , '=' , 'user')->get();
        $params = $request->except('_token');

        $params['auth_id'] = $auth[0]['id'];
        $params['password'] = Hash::make($params['password']);

        $user =new User($params);
        $user['auth_id']=$auth[0]['id'];
        $user['roll_no'] = $roll_no;
        $user->save();

        if($user){
            return $this->responseRedirect('signin', 'Register  successfully ! Please login' ,'success',false, false);

        }
    }
    else{
        return $this->responseRedirectBack('Only College email is valid (@cosmoscollege.edu.np)', 'error', true, true);
    }

    }
}
