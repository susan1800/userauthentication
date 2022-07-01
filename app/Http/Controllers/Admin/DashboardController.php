<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\NotificationCount;
use Artisan;
use Cache;

class DashboardController extends BaseController
{
    public function index(){
    // $user = User::count();
    //     $subject = subject::count();
    //     $program = program::count();
    //     $sociallinks=sociallink::whereNull('creator_id')->get();

    //     $reviews=feedback::all();
        $notification = NotificationCount::first();
    $this->setPageTitle('dashboard', 'dashboard');
        return view('/admin/dashboard/index' , compact('notification'));
        }


        function clearCache(Request $request)
    {
        Artisan::call('cache:clear');
        return "Cache cleared successfully";
    }
}
