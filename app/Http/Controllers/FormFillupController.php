<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Level;
use App\Models\FormData;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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

    //     $folderPath = public_path('images/');
    // //    dd($request->signature);

    //     $image_parts = explode(";base64,", $request->signature);
    //     $image_type_aux = explode("image/", $image_parts[0]);
    //     $image_type = $image_type_aux[1];
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $file = $folderPath .Str::random(25) . '.' . $image_type;
    //     file_put_contents($file, $image_base64);

    $folderPath = public_path('upload/');
       
        $image_parts = explode(";base64,", $request->signature);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);
       


        dd($signature);
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
