

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


                     <!--Grid Form-->

                     <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            
                            <div class="p-3">
                                <table class="table-responsive w-full rounded" style="width: 100%;">
                                @if (count($searchpayments) > 0)
                                    <thead>
                                      <tr>
                                        <th class="border w-1/4 px-4 py-2">Student Name</th>
                                        <th class="border w-1/6 px-4 py-2">Fee Status</th>
                                        <th class="border w-1/7 px-4 py-2">Approve Form</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($searchpayments as $payment)
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
                                           
                                        </tr>
                                        @endforeach
                                        
                                        
                                        
                                    </tbody>
                                @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->


