<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index(){
    // $user = User::count();
    //     $subject = subject::count();
    //     $program = program::count();
    //     $sociallinks=sociallink::whereNull('creator_id')->get();

    //     $reviews=feedback::all();

    $this->setPageTitle('dashboard', 'dashboard');
        return view('/admin/dashboard/index');
        }
}
