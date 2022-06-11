

<link rel="stylesheet" href="{{ url('frontend/style.css') }}">
<link rel="stylesheet" href="{{ url('frontend/core.css') }}">

<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div style="padding: 10px;">
<div class="aiz-titlebar text-left mt-2 mb-3 text-center">
    <h5 class="mb-0 h6 btn btn-primary action-btn ">Exam registration form</h5>
</div>

    <form class="form form-horizontal mar-top" action="products.store" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <div class="row gutters-5">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Student Details
                        </h5>
                    </div>

                
                            <div class="card-body">  
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail">Image <small></small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div for="formimage" class="input-group-text bg-soft-secondary font-weight-medium" >Browse</div>
                                            </div>
                                            <div  class="form-control file-amount">hoose File</div>
                                            <input id="formimage" type="file" name="image" class="selected-files"  style="display: none;">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted">(size less than 250kb)</small>
                                    </div>
                                </div>
                            </div>                

                     
                
               
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                Name
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="registration number">
                                University Registration number
                            </label>
                            <input type="text" name="registration_no" class="form-control" placeholder="Eg: 2019-1-10-0123">
                        </div>
                   

                        <div class="form-group mb-3">
                            <label for="program">
                                Program
                            </label>
                            <select name="program" id="program" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" data-placeholder="Choose Attributes" onchange="getSubject()">
                                <option> Select Program</option>
                                @foreach ($programs as $program)
                                <option value="{{$program->id}}"> {{$program->program}}</option>
                                @endforeach
                            </select>
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="program">
                                Level
                            </label>
                            <select id="level" name="level" class="form-control form-control aiz-selectpicker" onchange="selectexamrollno(); getSubject()" data-live-search="true">
                                <option value=""> Select level</option>
                                @foreach ($levels as $level)
                                <option value="{{$level->id}}"> {{$level->level}}</option>
                               
                                @endforeach
                            </select>


                            @foreach ($levels as $level)

                        @if ($level->level == "first semester")
                        
                        <input type="hidden" id="firestsemid" value="{{$level->id}}">
                            
                        @endif
                            
                        @endforeach
                            
                        </div>
                       

                        <div class="form-group mb-3" id="examrollno" style="display:none">
                            <label for="examrollno">
                                Exam Roll Number
                            </label>
                            <input type="text" name="examrollno" class="form-control" placeholder="Eg: 18120050">
                        </div>

                        <div class="form-group mb-3" >
                            <label for="year">
                               Year
                            </label>
                            <select class="form-control">
                                <option>Select Year</option>
                                @foreach ($times as $time)
                                    <option value="{{$time}}">{{$time}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>

            
            </div>
            <div class="col-lg-8">
                
                
                
              <div id="subject-content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Regular Subject
                        </h5>
                        
                    </div>

                
                            <div class="card-body">  
                            </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Back Subject
                        </h5>
                    </div>

                
                            <div class="card-body">  
                            </div>
                </div>

                </div>               
                




            </div>

           
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success action-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>


<script src="{{url('frontend/js/vendors.js')}}"></script>
<script src="{{ url('frontend/js/core.js')}}"></script>

<script>

  function selectexamrollno(){
    var levelid = document.getElementById('firestsemid').value;
    
    var levelselect = document.getElementById('level').value;
    if((levelid != levelselect)&&(levelselect!="")){

        document.getElementById('examrollno').style.display="block";
    }
    else{
        document.getElementById('examrollno').style.display="none";
    }
  }



  function getSubject(){
   
    var programid = document.getElementById('program').value;
    var levelid = document.getElementById('level').value;
    
    if(((programid.length)>0)&&((levelid.length)>0)){
        $.post('{{ route('getsubject') }}', {_token:'{{ csrf_token() }}',  programid:programid , levelid:levelid}, function(data)
               {
                console.log(data);
                if(data == 1){
                  $('#subject-content').html('Sorry, Something get error please try again');
                        
                }
                else{
                  
                        $('#subject-content').html(data);
                       
                                
                }
            });
    }
  }

</script>

