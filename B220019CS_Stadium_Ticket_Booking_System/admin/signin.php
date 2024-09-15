<?php require_once"db/session2.php";?>
<!DOCTYPE HTML>
<html>
<head>
<title>Signin</title>
<?php include_once"head_files.php";?>
</head>
<body>
	<div class="login">
		<h1><a href="#">Admin Login </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<form method="post" id="login_form">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" id="email" placeholder="Email">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" id="password"  placeholder="Password">
					<i class="fa fa-lock"></i>
				</div>
				 		 <label class="checkbox1" style="text-align;center;"><a href="forget.php">Forget Password</a></label>
				
			
			</div>
			<div class="col-md-6 login-do">
			<h2>Stadium Ticket Booking System</h2>
		
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" id="login_check" value="login">
					</label>
					
			</div>
			
			<div class="clearfix"> </div>
			</form>
			<p class="myerror" id="error"></p>
		</div>
	</div>
		<!---->
<?php include_once"footer.php";?>
<?php include_once"footer_scripts.php";?>
<script>
			
			
			$(document).ready(function(){
			$("#email").focus();
				$("#login_form").submit(function(){
					var email = $("#email").val();
					email = $.trim(email);
					var password = $("#password").val();
					password = $.trim(password);
					var email_valid = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					if(email=="")
					{
						alertify.error('Please Provide a Email');
						$("#email").focus();
						$("#email").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Email');
						return false;
					}
					if(!email_valid.test(email))
					{
						alertify.error('Invalid Email');
						$("#email").focus();
						$("#email").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Invalid Email');
						return false;
					}
					$("#email").closest(".login-mail").css('border','1px solid green');
					if(password.length<1)
					{
						alertify.error('Please Provide a Password');
						$("#password").focus();
						$("#password").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Password');
						return false;
					}
					else if(password.length<5)
					{
						alertify.error('Password Must Be 6 Charachter');
						$("#password").focus();
						$("#password").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Password Must Be 6 Charachter');
						return false;
					}
					$("#password").closest(".login-mail").css('border','1px solid green');
					$.ajax({
						url:'ajax/user.php',
						method:'post',
						data:{'email':email,'password':password,'signin':1},
						success:function(data){
							if(data==1)
							{
								$(this).attr("disabled","disabled");
								$("input").each(function(){
									$(this).val('');
								});
								alertify.success('Login Success');
								window.location="index.php";
								
							}
							else if(data==2)
							{
								$("#email").closest(".login-mail").css('border','2px solid #ec000069');
								$("#email").focus();
								$("#error").text("Email Not Registered");
								$("#password").closest(".login-mail").css('border','2px solid #A8A8A8');
								alertify.error("Email Not Registered");
							}
							else if(data==3)
							{
								$("#password").closest(".login-mail").css('border','2px solid #ec000069');
								$("#password").focus();
								$("#error").text("Credentials Wrong");
								alertify.error("Credentials Wrong");
							}
						}
					});
					return false;
					
				});
			});
			
			
		</script>
</body>
</html>

