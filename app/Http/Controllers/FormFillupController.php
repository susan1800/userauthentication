<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Level;
use App\Models\FormData;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Models\FormDataSubject;
use App\Models\FormDataBackSubject;
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
        

    //    dd($request);

if($request->signature == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS4AAACYCAYAAABapASfAAAAAXNSR0IArs4c6QAABHBJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECMQEFssrLgECBM5weQICBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMg8F2bAJlDULv5AAAAAElFTkSuQmCC"){

    return redirect()->back()->withInput($request->input());
}
  

    $folderPath = public_path('upload/');
       
        $image_parts = explode(";base64,", $request->signature);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);

        $filename = null;
        $uploadedFile = $request->file('formimage');
        // dd($uploadedFile);
        $filename = time().Str::random(25).'.'. $uploadedFile->getClientOriginalExtension();

        Storage::disk('public')->putFileAs(
            'formimage',
            $uploadedFile,
            $filename
        );
       

        $user_id = $request->session()->get('sessionuseridcosmos');
        
        $formId = FormData::where('exam_roll_no' , $request->examrollno)->first();
        if($formId){
            
            $this->setFlashMessage("Form Already Submitted in this Roll NO Please try different roll no", 'error');
            return redirect()->back()->withInput($request->input());
        }
        $user = User::find($user_id);
        
        $student= new FormData;
        $student->name=$request->name;
        $student->year=$request->year;
        $student-> registration_no= $request->registration_no;
        $student-> exam_roll_no= $request->examrollno;
        $student-> college_roll_no= $user->roll_no;
        $student-> user_id= $user_id;
        $student-> program_id= $request->program;
        $student-> level_id= $request->level;
        $student->image = 'formimage/'.$filename;
        $student->date = Carbon::now()->format('Y-m-d'); 
        $student->signature = $signature;

        $student->credit_hours = 0;
        $student->payment_remarks = " ";
        $student->payment_image = " ";

        // dd($student);
        $student-> save();

        $formId = FormData::where('exam_roll_no' , $request->examrollno)->first();
        
        
        for($i=1;$i<9;$i++){
            if($request[$i] != null){
                
                $regularSubject = new FormDataSubject;
                $regularSubject->form_data_id = $formId->id;
                $regularSubject->subject_id = $request[$i];
                
                $regularSubject->save();
            }
        }
        for($i=150;$i<250;$i++){
            if($request[$i] != null){
                $backSubject = new FormDataBackSubject;
                $backSubject->form_data_id = $formId->id;
                $backSubject->subject_id = $request[$i];
                $backSubject->save();
                dd($request[$i]);
            }
        }
    }
}
