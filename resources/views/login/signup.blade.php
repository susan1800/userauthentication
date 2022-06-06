<!-- <style>


* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

</style>






<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="/register"  method="post">
				@csrf
            <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="name" placeholder="User name " value="{{old('value')}}">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" class="login__input" name="email" placeholder="User Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" placeholder="Password">
				</div>
				<input type="submit" value="submit" class="button login__submit"	>			
			</form>
			
				<h3><a href="{{route('signin')}}">log in </a></h3>
				
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		html,
body {
  height: 100%;
}

body {
  color: #fff;
  font-family: "Open Sans", sans-serif;
  background: linear-gradient(blue, white), url('http://media-ict.nl/assets/img/bg.jpg') no-repeat center center fixed;
  /* rgba(0, 0, 0, 0.5) */
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}


a:focus {
  outline: none;
}

.btn:focus,
.btn:active:focus,
.btn.active:focus {
  outline: none;
}
/** Custom styles **/

.vis-hidden {
  visibility: hidden !important;
}

a {
  -webkit-transition: 0.25s;
  -moz-transition: 0.25s;
  -o-transition: 0.25s;
  transition: 0.25s;
}

#mainWrap {
  min-height: 100%;
  overflow: auto;
  padding-bottom: 96px;
}


#xlogin {
  border-radius: 25px;
  border: 0px dotted white;
  padding: 20px;
  background-color: purple;
  /* rgba(100, 100, 100, 0.7) */
  width: 480px;
  padding: 20px 40px;
  left: 50%;
  position: fixed;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

#xlogin h1 {
  text-align: center;
  font-weight: 700;
  margin: 5px 0 15px;
}

#xlogin h3 {
  text-align: center;
  font-size: 18px;
  color: #bbb;
  margin: 0 0 20px;
}

#xlogin .input-group-addon {
  border: 0 none;
}

#xlogin .form-control {
  border: 0 none;
}

#xlogin .form-control:focus {
  box-shadow: none;
}

#xlogin .formSubmit {
  margin-bottom: 25px;
}

#xlogin .submitWrap {
  text-align: right;
}

#xlogin .formNotice {
  margin: 0;
  font-size: 13px;
}

#xlogin .formNotice span {
  cursor: pointer;
  color: #428BCA;
}

#xlogin .formNotice2 {
  margin: 0;
  font-size: 13px;
}

#xlogin .formNotice2 span {
  cursor: pointer;
  color: #428BCA;
}

#xlogin .formNotice span:hover,
#xlogin .formNotice span:focus {
  color: #2A6496;
  text-decoration: underline;
}

#xlogin #regForm {
  display: none;
}
	</style>
</head>
<body>
<form action="#" id="regForm" method="get" class="form-horizontal">
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input name="username" type="text" class="form-control input-lg" placeholder="Username" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
								<input name="email" type="text" class="form-control input-lg" placeholder="E-mailadres" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
								<input name="password" type="password" class="form-control input-lg" placeholder="Password" autocomplete="off" required>
							</div>
						</div>
					</div>
					<div class="form-group formSubmit">
						<div class="col-sm-7">
							<div class="checkbox">
								<label>
									<input type="checkbox" autocomplete="off" checked="yes">I agree with the terms and conditions
								</label>
							</div>
						</div>
						<div class="col-sm-5 submitWrap">
						<input name="submit" class="btn btn-lg btn-success" type="submit" value="Register Now!"/>
							
						</div>
					</div>







					<hr>
					
					
					<div class="form-group formNotice2">
						<div class="col-xs-12">
						
						
<h3>							<p class="text-center">Already have a account?  <i class="fa fa-chevron-right "></i>  <span><a href="{{route('signin')}}">log in </a></span></p></h3>
						</div>
					</div>
				</form>
			</div>
			
			

			</div>
</body>
<script>
			$(document).ready(function() {
      
	  $("#xlogin").hide();
	  $("#xlogin").fadeIn(600);
				
				$('.formNotice span').click(function() {
					$("#logForm").hide();
					$("#regForm").fadeIn(500);
				});
  
   
  $('.formNotice2 span').click(function() {
	
		$("#regForm").hide();
					$("#logForm").slideDown(600);
					
				});
				
					
			});
</script>
</html>