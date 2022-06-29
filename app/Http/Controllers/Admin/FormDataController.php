<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\FormData;
use Mail;
use App\Models\NotificationCount;
use App\Models\Notification;
class FormDataController extends BaseController
{
    public function index(){
        $formDatas = FormData::latest()->get();
        $this->setPageTitle('view form', 'view form');
        $notification = NotificationCount::first();
        return view('/admin/viewformdatas/index' , compact('formDatas' , 'notification'));
    }
    public function changeFormStatus(Request $request){
        $notification = NotificationCount::first();
        $id = $request->rollno;
        $status = FormData::find($id);
        if($status->approve != 1){
            $status->approve = 1;
            $status->save();
            $details = [
                'title' => 'Cosmos College of Management and Technology ',
                'body' => "Your form is Accepted ",
                'message'=>'Please contact to Administrater for any query !',
                'contact'=>'015550878 , 015151350',
            ];
            \Mail::to($status->user->email)->send(new \App\Mail\FormApproveMessage($details));
            return 1;
        }
        return 0;
        
    }
    public function changeFormPaymentStatus(Request $request){
        $id = $request->rollno;
        $status = FormData::find($id);
        if($status->payment != 1){
        $status->payment = 1;
        }
        else{
            $status->payment = 0;
        }
        $status->save();
        return 1;
    }
    
}
