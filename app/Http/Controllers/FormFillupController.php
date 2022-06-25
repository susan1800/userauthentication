<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Level;
use App\Models\FormData;
use Carbon\Carbon;
class FormFillupController extends Controller
{
    public function index(){
    //    dd('');
        $currentyear = $date = Carbon::now()->format('Y');
        for($i=0;$i<10;$i++){
            $times[$i]= $currentyear - $i;
        }
        $levels = Level::get();
        $programs = Program::get();
        return view('form.fillupform' , compact('levels' , 'programs' , 'times'));
    }

    public function store(request $request)
    {
        dd($request);
        $student= new FormFillup;
        $student-> registration_no= $request['registration_no'];
        $student-> exam_roll_no= $request['exam_roll_no'];
        $student-> college_roll_no= $request['college_roll_no'];
        $student-> user_id= $request['user_id'];
        $student-> program_id= $request['program_id'];
        $student-> level_id= $request['level_id'];
        $student-> save();
    }
}
