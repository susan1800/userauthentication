
@include('partials.head')

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h2>Cosmos College</h2>
      <h4>Register</h4>

        @include('partials.flash')

    </header>

    <form class="login-form" action="{{route('register')}}" method="post">
		@csrf

      <input type="name" name="name" class="login-input  @error('phone') is-invalid @enderror" placeholder="Name" value="{{old('name')}}" required autofocus/>
      <p style="color: red; margin-top:-23px;">@error('name') {{ $message }} @enderror</p>


      <input type="number" name="phone" class="login-input form-control @error('phone') is-invalid @enderror" placeholder="phone number" value="{{old('phone')}}" required/>
        <p style="color: red; margin-top:-23px;">@error('phone') {{ $message }} @enderror</p>
	    <input type="email" name="email" class="login-input  @error('phone') is-invalid @enderror" placeholder="email" value="{{old('email')}}" required />
        <p style="color: red; margin-top:-23px;">@error('email') {{ $message }} @enderror</p>
      <input type="password" name="password" class="login-input  @error('phone') is-invalid @enderror" placeholder="Password" required/>
      <p style="color: red; margin-top:-23px;">@error('password') {{ $message }} @enderror</p>
      @error('password') {{ $message }} @enderror

      <div class="submit-container">
        <button type="submit" class="login-button">SIGN Up</button>

      </div>
	  <br>
	  <p style="text-align:center">Already Have an account <a href="{{route('signin')}}">Sign In</a></p>
    </form>

  </section>


</div>


@include('partials.script')
