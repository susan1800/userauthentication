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
                                    <input type="search" style=" border-radius: 20px; box-shadow: 2px 2px #888888; padding:5px;" placeholder="Search ...">
                                </div>
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Student Name</th>
                                        <th class="border w-1/6 px-4 py-2">City</th>
                                        <th class="border w-1/6 px-4 py-2">Course</th>
                                        <th class="border w-1/6 px-4 py-2">Fee Status</th>
                                        <th class="border w-1/7 px-4 py-2">Approve Form</th>
                                        <th class="border w-1/5 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-2">Micheal Clarke 180101</td>
                                            <td class="border px-4 py-2">Sydney</td>
                                            <td class="border px-4 py-2">MS</td>
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" checked onchange="changeformstatus(this)" value="">
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="border px-4 py-2">Rickey Ponting 180102</td>
                                            <td class="border px-4 py-2">Sydney</td>
                                            <td class="border px-4 py-2">MS</td>
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Micheal Clarke 180101</td>
                                            <td class="border px-4 py-2">Sydney</td>
                                            <td class="border px-4 py-2">MS</td>
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-check text-green-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Micheal Clarke 180101</td>
                                            <td class="border px-4 py-2">Sydney</td>
                                            <td class="border px-4 py-2">MS</td>
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Micheal Clarke 180101</td>
                                            <td class="border px-4 py-2">Sydney</td>
                                            <td class="border px-4 py-2">MS</td>
                                            <td class="border px-4 py-2">
                                                <i class="fas fa-times text-red-500 mx-2"></i>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                  </label>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-eye"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                        <i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
 <div style="position: fixed;bottom:5; " >
  <div class="alert alert-success alert-dismissible wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s" role="alert" id="showhiddenmessage" style="display:none; width:300px; ">
    <button class="close" type="button" data-dismiss="alert" style="font-size: 15px; margin-top:-15px; text-decoration:bold;" onclick="closethis('showhiddenmessage')"><strong>x</strong></button>
    <strong id="showalertmessage" style="width: 300px; font-size:13px;"></strong> 
</div>
<div class="alert alert-danger alert-dismissible" role="alert" id="showhiddenerrmessage" style=" display:none; width:300px;">
  <button class="close" type="button" data-dismiss="alert" style="font-size: 15px; margin-top:-15px; text-decoration:bold;"><strong>x</strong></button>
  <strong id="showalertmessage" style="width: 300px; font-size:13px;"></strong> 
</div>
</div>

@endsection

@section('script')


<script>
  function changeformstatus(event){
 
 var rollno = event.value;
 $.post('{{ route('changepaymentformstatus') }}', {_token:'{{ csrf_token() }}',  rollno:rollno}, function(data)
               {
                 console.log(data);
                 if(data == 1){
                   document.getElementById('showhiddenmessage').style.display="block";
                   setTimeout(function(){ 
                     document.getElementById('showhiddenmessage').style.display="none"; 
                   }, 3000);
                   
                   document.getElementById('showalertmessage').innerHTML="Status Updated successfully !";
                   document.getElementById('showalerterrormessage').innerHTML="";
                   // alert('success');
                   // $('#search-content').html('Sorry, nothing found for Roll No : <b>"'+searchKey+'"</b>'); 
                 }
                 else{
                   // alert('error');
                   document.getElementById('showhiddenmessage').style.display="block";
                   document.getElementById('showalertmessage').innerHTML="";
                   document.getElementById('showalerterrormessage').innerHTML="";
                   // $('#search-content').html(data);  
                 }
             });
}

function closethis(ev){

}
</script>

@endsection
