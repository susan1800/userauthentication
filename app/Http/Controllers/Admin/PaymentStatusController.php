<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PaymentStatusController extends BaseController
{
    public function index(){
        $this->setPageTitle('payment status', 'payment status');
        return view('/admin/paymentstatus/index');
    }
}
