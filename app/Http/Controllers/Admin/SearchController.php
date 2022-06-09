<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->search;
        $searchpayments = PaymentStatus::where('roll_no', 'like', '%' . $query . '%')->get();
        // $searchpayments = PaymentStatus::where('roll_no' , 'like' , '%'.$query.'%')->get();
        // dd($searchpayments);
        return view('admin.partials.search' , compact('searchpayments'));
    }
}
