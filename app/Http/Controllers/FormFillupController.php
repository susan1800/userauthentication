<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Level;
use App\Models\FormData;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class FormFillupController extends BaseController
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

       

if($request->signature != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS4AAACYCAYAAABapASfAAAAAXNSR0IArs4c6QAABHBJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECMQEFssrLgECBM5weQICBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMg8F2bAJlDULv5AAAAAElFTkSuQmCC"){

    $folderPath = public_path('upload/');
       
        $image_parts = explode(";base64,", $request->signature);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);
}
else{
    return redirect()->back()->withInput($request->input());

}
        dd($request);


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
