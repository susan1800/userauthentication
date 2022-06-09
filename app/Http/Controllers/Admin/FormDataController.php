<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class FormDataController extends BaseController
{
    public function index(){
        $this->setPageTitle('view form', 'view form');
        return view('/admin/viewformdatas/index');
    }
}
