<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.app')

@section('style')
<style>
    .switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 23px;
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 21px;
}

.slider.round:before {
  border-radius: 50%;
}



    </style>
@endsection

@section('content')
@include('admin.partials.flash')

                     <!--Grid Form-->

                     <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                                <div style="float: right; display:inline-flex">
                                    <input type="text" id="search" name="search" style=" border-radius: 20px; box-shadow: 2px 2px #888888; padding:5px;" placeholder="Search ..." onkeyup="search()" onkeydown="search()" onclick="search()" onchange="search()">
                                    
                                </div>
                               
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Student Name</th>
                                        <th class="border w-1/6 px-4 py-2">Fee Status</th>
                                        <th class="border w-1/7 px-4 py-2">Approve Form</th>
                                        {{-- <th class="border w-1/5 px-4 py-2">Actions</th> --}}
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($payments as $payment)
                                        <tr>
                                            <td class="border px-4 py-2">{{$payment->name}} {{$payment->roll_no}}</td>

                                            <td class="border px-4 py-2">
                                              @if ($payment->status == 1)
                                              <i class="fas fa-check text-green-500 mx-2"></i>
                                              @else
                                              <i class="fas fa-times text-red-500 mx-2"></i>
                                              @endif
                                                
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" @if ($payment->approve_form == 1)
                                                    checked
                                                    @endif >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            {{-- <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td> --}}
                                        </tr>
                                        @endforeach
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->



@endsection
<script>
   $(document).ready(function() {
$('#search').on('keyup', function(){
            
            search();
        });

        $('#search').on('focus', function(){
            search();
           
        });
      });

        function search(){
          

            // var searchKey = $('#search').val();
            var searchKey = document.getElementById('search').value;
          
          
            
            if(searchKey.length > 2){
              // Get the modal
              var modal = document.getElementById("myModal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close00")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
                modal.style.display = "block";

                $.post('{{ route('searchajax') }}', {_token:'{{ csrf_token() }}',  search:searchKey}, function(data)
               {
                console.log(data);
                if(data == 1){
                  $('#search-content').html('Sorry, nothing found for Roll No : <b>"'+searchKey+'"</b>'); 
                }
                else{
                  $('#search-content').html(data);  
                }
            });

            }
            else {
              var modal = document.getElementById("myModal00");
              modal.style.display = "none";
             
                
            }
           
        }
        
    $(document).ready(function() {
     var modal = document.getElementById("myModal00");
     window.onclick = function(event) {
        modal.style.display = "none";                  
    }
});

</script>
@section('script')  @endsection
