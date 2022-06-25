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
                <tr id="">
                    <th><input type ="hidden" name = '{{$i}}' value = '{{$subject->id}}'/><p>{{$i}}</p></th>
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

<input type="hidden" name='100' id="100">
<input type="hidden" name='101' id="101">
<input type="hidden" name='102' id="102">
<input type="hidden" name='103' id="103">
<input type="hidden" name='104' id="104">
<input type="hidden" name='105' id="105">
<input type="hidden" name='106' id="106">
<input type="hidden" name='107' id="107">
<input type="hidden" name='108' id="108">
<input type="hidden" name='109' id="109">

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
                    @if (!empty($subject->concurrent_id))
                    <tr style="padding:5px;" id="{{$subject->id}}" name="{{$subject->id}}">
                        {{-- <th>{{$i}}</th> --}}
                        <th>
                            <input type="hidden" name="concurrent{{$i}}" id="concurrent{{$i}}" value="{{$subject->id}}">
                               
                            @php
                                $concurrent = App\Models\Subject::where('id' , $subject->concurrent_id)->first();
                                
                                $i++;
                            @endphp
                                
                           {{$concurrent->subject}} 
                        </th>
                        <th>{{$concurrent->subject_code}}

                        <!-- <input type="hidden" name="{{$i}}" id="" value="{{$concurrent->id}}"> -->
                        </th>
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




    function removeconcurrent(rowid){
        if(confirm("This is concurrent subject , are you sure to remove ?")){
        // document.getElementById(id).remove();


        var table = document.getElementById('backtable');  
        var rowCount = table.rows.length;  
        for (var i = 0; i < rowCount; i++) {  
            var row = table.rows[i];  
           
            var rowObj = row.cells[0];  
           alert(rowObj.name);
            if (rowObj.id == rowid) {  
                alert('dfgf');
                table.deleteRow(i);  
                rowCount--;  
            }  
        }  
        } 


}
        function removeRow(btnName) {  
    try {  
        var table = document.getElementById('backtable');  
        var rowCount = table.rows.length;  
        for (var i = 0; i < rowCount; i++) {  
            var row = table.rows[i];  
            var rowObj = row.cells[0].childNodes[0];  
            alert('gf');
            if (rowObj.name == btnName) {  
                table.deleteRow(i);  
                rowCount--;  
            }  
        }  
    } catch (e) {  
        alert(e);  
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
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        // var cell4 = row.insertCell(3);
        
        cell1.innerHTML = "<br>"+subject+"</br>";
        cell2.innerHTML = "<br>"+code+"</br>";
        cell3.innerHTML = "retake";
       
        var cell4 = row.insertCell(4); 
        var rowCount = table.rows.length;  
        var row = table.insertRow(rowCount);  
        alert('xghvgf');
        var element1 = document.createElement("input"); 
        
        
        
        element1.type = "button";  
        var btnName = "button" + (rowCount + 1);  
        element1.name = btnName;  
        element1.setAttribute('value', 'Delete'); // or element1.value = "button";  
        element1.onclick = function() {  
            removeRow(btnName);  
        }  
        
        cell4.appendChild(element1);  

        // cell4.innerHTML = '<p style="color:red;" id="'+code+'">&#10008;</p>'
        }
    }




</script>