
@include('partials.head')

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h3>Cosmos College</h3>
      <h4>Login</h4>
    </header>
    <form class="login-form" action="{{route('login')}}" method="post">
		@csrf
      <input type="email" name="email" class="login-input" placeholder="email" required autofocus/>
      <input type="password" name="password" class="login-input" placeholder="Password" required/>
      <div class="submit-container">
        <button type="submit" class="login-button">SIGN IN</button>
		
      </div>
	  <br>
	  <p style="text-align:center">Dont Have an account <a href="{{route('signup')}}"> Sign Up </a></p>
    </form>
	<p>Remember me <input type="checkbox" ></p>
	<p style="text-align:right"><a href="">Forgot Password</a></p>
  </section>
  
 
</div>


@include('partials.script')