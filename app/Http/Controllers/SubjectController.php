<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
class SubjectController extends Controller
{
    public function getSubject(Request $request){
        $level = Level::find($request->levelid);
    //     if($level->value == "1"){
    //         $allsubjects = [];
    //     }
    //     elseif($level->level == "second semester"){
    //         $allsubjects = Subject::where('program' , $request->programid)->where('level');
    //     }
    //     elseif($level->level == "third semester"){

    //     }
    //     elseif($level->level == "forth semester"){

    //     }
    //     elseif($level->level == "fifth semester"){

    //     }
    //     elseif($level->level == "sixth semester"){

    //     }
    //     elseif($level->level == "seventh semester"){

    //     }
    //     elseif($level->level == "eighth semester"){

    //     }
    //    else{

    //     }
        $subjects = Subject::where('program_id' , $request->programid)->where('level_id' , $request->levelid)->get();
        
        
        return view('form.partials.subject' , compact('subjects'));
    }
}
