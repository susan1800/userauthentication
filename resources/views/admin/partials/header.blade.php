<header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">



                    <a href="#" onmouseover="profileToggle()" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan ></a>
                    <a href="#" onmouseover="profileToggle()" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block" style="margin-right:50px"></a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r" style="margin-top:200px; margin-right: 150px; ">
                        <ul class="list-reset " >
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="{{route('adminlogout')}}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->
