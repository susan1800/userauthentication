<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewFormDataController extends Controller
{
    public function index(){

         $this->setPageTitle('dashboard', 'dashboard');
        return view('/admin/dashboard/index');
    }
}
