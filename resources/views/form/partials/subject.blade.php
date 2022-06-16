<style>
    .mousefocus:hover{
        cursor: pointer;
    }
</style>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">
            Regular Subject
        </h5>
        
    </div>


            <div class="card-body">  
                <table border="1" style="width:100%;">
                <tr>
                    <th>SN</th>
                    <th>Subject</th>
                    <th>Subject Code</th>
                </tr>
                @php
                    $i=1;
                @endphp
                
                @foreach ($subjects as $subject)
                <tr id="{{$subject->concorrents}}">
                    <th><p>{{$i}}</p></th>
                    <th>
                        @if (!empty($subject->barrier_id))
                        @php
                        $barrier = App\Models\Subject::where('id' , $subject->barrier_id)->first();
                        
                        $i++;
                    @endphp
                            <select class="form-control" onchange="selectbarrier()" id="getregularorbarrier">
                                <option>Select Regular or Barrier subject</option>
                                
                                <option value="{{$barrier->subject_code}}">{{$barrier->subject}}</option>
                                <option value="{{$subject->subject_code}}">{{$subject->subject}}</option>
                            </select>
                            <th id="regularorbarriercode"></th>
                        @else
                            {{$subject->subject}}
                            <th>{{$subject->subject_code}}</th>
                        @endif
                    </th>
                    
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
                </table>
            </div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">
            Back Subject 
        </h5>
            <div style="text-align: right; display:inline-flex">
               
                {{-- <input type="text" id="addbacksubject" class="form-control" style="border-radius: 50px; color:black" placeholder="Add back subject">
                 --}}
                 <select class="form-control" id="addbacksubject">
                    <option value="">Add back subject</option>
                    @foreach ($allsubjects as $allsubject)
                        
                   {{-- @if () --}}
                       
                  
                    <option value="{{$allsubject->subject_code}}">{{$allsubject->subject}}</option>
                  
                    {{-- @endif --}}
                    @endforeach
                 </select>
                 @foreach ($allsubjects as $allsubject)
                        
                
                  <input type="hidden" value="{{$allsubject->subject}}" id="{{$allsubject->subject_code}}">
                 
                  @endforeach
                <h1 class="mousefocus" onclick="addbackrow()">&#10146;</h1>
            </div>
        
    </div>


            <div class="card-body">  
                <table border="1" style="width:100%;" id="backtable">
                    <tr>
                       
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Remarks</th>
                        <th>Option</th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    
                    @foreach ($subjects as $subject)
                    @if (!empty($subject->concorrent_id))
                    <tr style="padding:5px;" id="{{$subject->id}}">
                        {{-- <th>{{$i}}</th> --}}
                        <th>
                            
                               
                            @php
                                $concorrent = App\Models\Subject::where('id' , $subject->concorrent_id)->first();
                                
                                $i++;
                            @endphp
                                
                           {{$concorrent->subject}} 
                        </th>
                        <th>{{$concorrent->subject_code}}</th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center" onclick="removeconcurrent('{{$subject->id}}')">&#10008;</p></th>
                    </tr>
                   
                    @endif
                   
                    
                    @endforeach
                    </table>
            </div>
</div>



<script>



document.getElementById("choice_form").onkeypress = function(e) {
   
    // var key = document.getElementById('addbacksubject').value;     
    // return event.key != 'Enter'
    
  }




    function removeconcurrent(id){
        if(confirm("This is concurrent subject , are you sure to remove ?")){
        document.getElementById(id).remove();
        }
    }
    function selectbarrier(){
        var code = document.getElementById('getregularorbarrier').value;
        
        if(confirm("This is Barrier subject , are you sure to change it ?")){
        document.getElementById('regularorbarriercode').innerHTML=code;
        }
    }
    function addbackrow(){
        var table = document.getElementById('backtable');
        var code=document.getElementById('addbacksubject').value;
        var subject=document.getElementById(code).value;
        if(code!= ''){
        var row = table.insertRow();
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();
        
        cell1.innerHTML = "<br>"+subject+"</br>";
        cell2.innerHTML = "<br>"+code+"</br>";
        cell3.innerHTML = "Concurrent Subject (Remove if you dont have back in this subject)";
       
        cell4.innerHTML = "<p style='color:red;' onclick='removeconcurrent('{{$subject->subject_code}}')'>&#10008;</p>"
        }
    }




</script>