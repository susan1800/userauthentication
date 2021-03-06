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
use App\Models\Notification;
use App\Models\NotificationCount;
use Illuminate\Support\Facades\Crypt;

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
        $this->validate($request, [
            'name'      =>  'required',
            'year'      =>  'required',
            'registration_no'      =>  'required',
            'program'      =>  'required',
            'level' =>'required',
            'formimage' =>  'required|mimes:jpg,jpeg,png',
            'signature'  => 'required',
            
        ]);
        
    try {
    if($request->signature == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS4AAACYCAYAAABapASfAAAAAXNSR0IArs4c6QAABHBJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECMQEFssrLgECBM5weQICBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMgYLj8AAECOQHDlatMYAIEDJcfIEAgJ2C4cpUJTICA4fIDBAjkBAxXrjKBCRAwXH6AAIGcgOHKVSYwAQKGyw8QIJATMFy5ygQmQMBw+QECBHIChitXmcAECBguP0CAQE7AcOUqE5gAAcPlBwgQyAkYrlxlAhMg8F2bAJlDULv5AAAAAElFTkSuQmCC"){

        return $this->responseRedirectBack('Please fill all the details .', 'error', true, true)->withInput($request->input());
    }
    $user_id = $request->session()->get('sessionuseridcosmos');

    $formId = FormData::where('user_id' , $user_id)->first();
    // if($formId){
    // //     $this->setFlashMessage("You Already submitted Your Form Please contact to administrator for any query !", 'error');
    //     return $this->responseRedirectBack('You Already submitted Your Form Please contact to administrator for any query !', 'error', true, true)->withInput($request->input());
    // }
    
    $signature = $this->uploadsignature($request->signature);
if($signature == 0){
    return $this->responseRedirectBack('Error occurred while creating form. Please try again .', 'error', true, true)->withInput($request->input());
}
        $filename = null;
        $uploadedFile = $request->file('formimage');
        $filename = time().Str::random(25).'.'. $uploadedFile->getClientOriginalExtension();
        Storage::disk('public')->putFileAs(
            'formimage',
            $uploadedFile,
            $filename
        );
    
       

        if($this->createFormData($request , $user_id , $filename , $signature)==0){
            return $this->responseRedirectBack('Error occurred while creating form. Please tyy again.', 'error', true, true)->withInput($request->input());
        }

        $formId = FormData::where('exam_roll_no' , $request->examrollno)->first();
        
        
       if($this->createRegularSubject($request , $formId['id'])==0){
        
        $form = FormData::find($formId);
        $form->delete();
        return $this->responseRedirectBack('Error occurred while creating form. Please tyy again.', 'error', true, true)->withInput($request->input());
       }
     
       $backSubject = $this->createBackSubject($request , $formId['id']);
       if($backSubject==0){
        $subjects = FormDataSubject::where('form_id' , $formId['id']);
        foreach($subjects as $subject){
            
            $sub = FormDataSubject::find($subject->id);
            $sub->delete();
        }
        $form = FormData::find($formId['id']);
        $form->delete();
        return $this->responseRedirectBack('Error occurred while creating form. Please tyy again.', 'error', true, true)->withInput($request->input());
       }
      
       if($this->createNotification($formId['id'])==0){

       }
       if($this->incrementNotificationCount()==0){

       }



       $totalfee = 2500 + $backSubject*300;
       $totalfee = $hashcode =Crypt::encryptString($totalfee);
      
       return redirect()->route('payment.showpaymentmethod' , compact('totalfee'));

       











       return $this->responseRedirectBack('Form submit successfully.', 'success', true, true);
    } catch (QueryException $exception) {
        return $this->responseRedirectBack('Error occurred while creating form.  Please tyy again.', 'error', true, true)->withInput($request->input());
    }
    }

    private function uploadsignature($signature){
        try{

    $folderPath = public_path('upload/');
       
    $image_parts = explode(";base64,", $signature);
         
    $image_type_aux = explode("image/", $image_parts[0]);
       
    $image_type = $image_type_aux[1];
       
    $image_base64 = base64_decode($image_parts[1]);

    $signature = uniqid() . '.'.$image_type;
       
    $file = $folderPath . $signature;

    file_put_contents($file, $image_base64);
    return $signature;
} catch (QueryException $exception) {
    return 0;
}
    }

    private function createFormData($request , $user_id , $filename , $signature){
        try{
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
        $student-> save();
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }


    private function createRegularSubject($request , $formId){
        try{
                for($i=1;$i<9;$i++){
            if($request[$i] != null){
                
                $regularSubject = new FormDataSubject;
                $regularSubject->form_data_id = $formId;
                $regularSubject->subject_id = $request[$i];
                
                $regularSubject->save();
            }
        }
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function createBackSubject($request , $formId){
        try{
            $j=0;
        for($i=150;$i<250;$i++){
            if($request[$i] != null){
                $backSubject = new FormDataBackSubject;
                $backSubject->form_data_id = $formId;
                $backSubject->subject_id = $request[$i];
                $backSubject->save();
                $j++;
               
            }
        }
        return $j;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function createNotification($formId){
        try{
        $notification = new Notification;
        $notification->form_id = $formId;
        $notification->save();
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }
    private function incrementNotificationCount(){
        try{
        $notificationcount = NotificationCount::first();
        $notificationcount->count += 1;
        $notificationcount->save();
        return 1;
    } catch (QueryException $exception) {
        return 0;
    }
    }
}
