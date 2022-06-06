
@include('partials.head')

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h2>Application Name</h2>
      <h4>Login</h4>
    </header>
    <form class="login-form" action="{{route('register')}}" method="post">
		@csrf
      <input type="name" name="name" class="login-input" placeholder="Name" required autofocus/>
      <input type="number" name="phone" class="login-input" placeholder="phone number" required/>
	  <input type="email" name="email" class="login-input" placeholder="email" required />
      <input type="password" name="password" class="login-input" placeholder="Password" required/>
	  
      <div class="submit-container">
        <button type="submit" class="login-button">SIGN Up</button>
		
      </div>
	  <br>
	  <p style="text-align:center">Already Have an account <a href="{{route('signin')}}">Sign In</a></p>
    </form>
	
  </section>
  
 
</div>


@include('partials.script')