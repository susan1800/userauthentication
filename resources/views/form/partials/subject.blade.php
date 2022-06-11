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
                            <select class="form-control">
                                <option>Select Regular or Barrier subject</option>
                                <option>{{$subject->subject}}</option>
                                <option>{{$barrier->subject}}</option>
                            </select>
                        @else
                            {{$subject->subject}}
                        @endif
                    </th>
                    <th>{{$subject->subject_code}}</th>
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
               
                <input type="text" id="addbacksubject" class="form-control" style="border-radius: 50px; color:black" placeholder="Add back subject">
                <h1>&#10146;</h1>
            </div>
        
    </div>


            <div class="card-body">  
                <table border="1" style="width:100%;">
                    <tr>
                        <th>SN</th>
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
                    <tr style="padding:5px;">
                        <th>{{$i}}</th>
                        <th>
                            
                               
                            @php
                                $concorrent = App\Models\Subject::where('id' , $subject->concorrent_id)->first();
                                
                                $i++;
                            @endphp
                                
                           {{$concorrent->subject}} 
                        </th>
                        <th>{{$concorrent->subject_code}}</th>
                        <td>Concurrent Subject (Remove if you dont have back in this subject)</td>
                        <th style="text-align: cemter; color:red"><p style="text-align: center">&#10008;</p></th>
                    </tr>
                   
                    @endif
                   
                    
                    @endforeach
                    </table>
            </div>
</div>
