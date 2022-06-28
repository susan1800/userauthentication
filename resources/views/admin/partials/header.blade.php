<style>
    /*
model box 
*/
/* The Modal (background) */
.modal00 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  float:right;
  margin-top: 70px;
  width: 100%; /* Full width */
  height: 80%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background: #d9dadb;

}

/* Modal Content */
.modal-content00 {
  
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  floar:right;
  height:100%;
  overflow:auto;
 

}

/* The Close Button */
.close00 {
  color: #aaaaaa;
  float: left;
  font-size: 28px;
  font-weight: bold;
}

.close00:hover,
.close00:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<header class="bg-nav" style="position: fixed; width:100%; margin-bottom:80px; z-index:3;">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">


                  <a href="#" class="text-white p-2 no-underline hidden md:block lg:block"><img src="{{url('/backend/image/notification.png')}}" style="border-radius:50%; width:40px;height:40px; margin-left:20px;"></a>
                    <a href="#"  onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block"><img src="{{url('/backend/image/profile.jpeg')}}" style="border-radius:50%; width:40px;height:40px; margin-left:20px;"></a>
                    <a href="#"  class="text-white p-2 no-underline hidden md:block lg:block" style="margin-right:50px"></a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r" style="margin-top:200px; margin-right: 150px; ">
                        <ul class="list-reset " >
                          
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="{{route('adminlogout')}}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div style="margin-top: 80px;">
        <div id="myModal" class="modal00">

            <!-- Modal content -->
            <div class="modal-content00">
              <span class="close00">&times;</span>
              <p></p>
              <div id="search-content"></div>
            </div>
          
          </div>
        <!--/Header-->
<script>
  function profileToggle() {
           
    var profileDropdown = document.getElementById('ProfileDropDown').style;
    if (profileDropdown.display == "none") {
        profileDropdown.display = "block";
    } else {
        profileDropdown.display = "none";
    }
}
        </script>
