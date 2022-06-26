<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\User;

class PaymentStatusController extends BaseController
{
    public function index(){
        $payments = PaymentStatus::leftJoin('users', 'users.roll_no', '=', 'payment_statuses.roll_no')
        ->get(['users.*', 'payment_statuses.*']);
        $this->setPageTitle('payment status', 'payment status');
        return view('/admin/paymentstatus/index' , compact('payments'));
    }
    public function changeFormStatus(Request $request){
        return 1;
    }

   
}
