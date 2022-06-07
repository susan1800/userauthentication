
@include('partials.head')

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h3>Cosmos College</h3>
      <h4>Login</h4>
    </header>
    <div class="flash">
        @include('partials.flash')
    </div>
    <form class="login-form" action="{{route('login')}}" method="post">
		@csrf
      <input type="email" name="email" class="login-input  @error('email') is-invalid @enderror" placeholder="email"  required autofocus/>
      <p style="color: red; margin-top:-23px;">@error('email') {{ $message }} @enderror</p>
      <input type="password" name="password" class="login-input  @error('password') is-invalid @enderror" placeholder="Password" required/>
      <p style="color: red; margin-top:-23px;">@error('password') {{ $message }} @enderror</p>
      <div class="submit-container">
        <button type="submit" class="login-button">SIGN IN</button>

      </div>
	  <br>
	  <p style="text-align:center">Dont Have an account ? <a href="{{route('signup')}}"> Sign Up </a></p>
    </form>

	<p style="text-align:right"><a href="">Forgot Password</a></p>
  </section>


</div>


@include('partials.script')
