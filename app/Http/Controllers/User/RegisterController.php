<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function register(Request $request){

        $this->validate($request, [
            'name'      =>  'required|max:191',
            'email'    =>  'required|email',
            'phone'    =>  'required|digits:10',
            'password' =>  'required|min:6',

        ]);

        $user =User::where('email' , '=' , $request->email)->get();
        if(sizeof($user) > 0){

            return redirect()->route('signin');
        }



        $auth = Auth::where('title' , '=' , 'user')->get();
        $params = $request->except('_token');
        $params['auth_id'] = $auth[0]['id'];
        $params['password'] = Hash::make($params['password']);

        $user =new User($params);
        $user['auth_id']=$auth[0]['id'];

        $user->save();

        if($user){
            return redirect()->route('signin');
        }

    }
}
