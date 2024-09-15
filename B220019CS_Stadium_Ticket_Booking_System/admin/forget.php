<?php require_once"db/session2.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Stadium Ticket Booking</title>
		<?php include_once"head_files.php";?>
	</head>
	<body>
		<div class="login">
			
			<div class="login-bottom">
				<h2 class="text-center">Forget Password</h2>
				<form method="post" id="login_form">
					<div class="col-md-12">
						<div class="login-mail">
							<input type="text" id="email"  placeholder="Enter Email">
							<i class="fa fa-envelope"></i>
						</div>
						
						
					</div>
					<div class="col-md-12 login-do">
						
						<p class="myerror" id="error"></p>
						<label class="hvr-shutter-in-horizontal login-sub">
							<input type="submit"  id="login_check" value="Forget Password">
						</label>
						
						<p>Remember Password 	?</p>
						<a href="signin.php" class="hvr-shutter-in-horizontal">Login Now</a>
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
							$.ajax({
								url:'ajax/user.php',
								method:'post',
								data:{'email':email,'forget':1},
								success:function(data){
									if(data==1)
									{
										$("#error").text('');
										$("input").each(function(){
											$(this).val('');
										});
										alertify.alert("Password Reseted", function(){
											window.location="resetpassword.php";
										});
										
										
									}
									else
									{
										alertify.error("Email Not Exists");
										$("#email").closest(".login-mail").css('border','2px solid #ec000069');
										$("#lg").fadeOut();
										$("#error").text('Email Not Registered');
									}
									
								}
							});
							return false;
							
						});
					});
					
					
				</script>
	</body>
</html>

