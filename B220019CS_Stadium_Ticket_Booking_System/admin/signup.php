<?php require_once"db/session2.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Stadium Ticket Booking</title>
		<?php include_once"head_files.php";?>
	</head>
	<body>
		<div class="login">
			<h1><a href="index.php">Minimal </a></h1>
			<div class="login-bottom">
				<h2>Register</h2>
				<div class="col-md-6">
					<div class="login-mail">
						<input type="text" placeholder="Email"  id="signup_email" required="">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="login-mail">
						<input type="password"  id="signup_password" placeholder="Password" required="">
						<i class="fa fa-lock"></i>
					</div>
					<div class="login-mail">
						<input type="password"id="signup_cpassword" placeholder="Repeated password" required="">
						<i class="fa fa-lock"></i>
					</div>
					<a class="news-letter" href="#">
						<label class="checkbox1"><input type="checkbox" checked="checked" id="agree" name="checkbox" ><i> </i>I agree with the terms</label>
					</a>
					
				</div>
				
				<div class="col-md-6 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="submit" id="signup" value="Signup">
					</label>
					<p>Already register</p>
					<a href="signin.php" class="hvr-shutter-in-horizontal">Login</a>
				</div>
				
				<div class="clearfix"> </div>
				<p class="myerror" id="error"></p>
			</div>
		</div>
		<!---->
		<?php include_once"footer.php";?>
		<script>
			$(document).ready(function(){
				$("#signup_email").focus();
				$("#signup").click(function(){
					var email = $("#signup_email").val();
					email = $.trim(email);
					var password = $("#signup_password").val();
					password = $.trim(password);
					var cpassword = $("#signup_cpassword").val();
					var agree = $("#agree").is(':checked');
					cpassword = $.trim(cpassword);
					var email_valid = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					
					if(email=="")
					{
						$("#signup_email").focus();
						$("#signup_email").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Email');
						alertify.error('Please Provide a Email');
						return false;
					}
					if(!email_valid.test(email))
					{
						$("#signup_email").focus();
						$("#signup_email").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Invalid Email');
						alertify.error('Invalid Email');
						return false;
					}
					$("#signup_email").closest(".login-mail").css('border','1px solid green');
					
					if(password.length<5)
					{
						$("#signup_password").focus();
						$("#signup_password").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Password Must Be 6 Charachter');
						alertify.error('Password Must Be 6 Charachter');
						return false;
					}
					$("#signup_password").closest(".login-mail").css('border','1px solid green');
					if(password!=cpassword)
					{
						$("#signup_cpassword").focus();
						$("#signup_password").closest(".login-mail").css('border','2px solid #ec000069');
						$("#signup_cpassword").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Password And Confirm Password Not Match');
						alertify.error('Password And Confirm Password Not Match');
						return false;
					}
					$("#signup_cpassword").closest(".login-mail").css('border','1px solid green');
					
					if(!agree)
					{
						$("#agree").focus();
						$("#agree").closest(".news-letter").css('border','2px solid #ec000069');
						$("#error").text('Please Accept The Agreement');
						alertify.error('Please Accept The Agreement');
						return false;
					}
					$("#agree").closest(".news-letter").css('border','none');
					
					
					$("#error").text('');
					
					$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"email":email,"password":password,"cpassword":cpassword,"signup":1},
						success:function(data){
							if(data==1)
							{
								$(this).attr("disabled","disabled");
								$("input").each(function(){
									$(this).val('');
								});
								alertify.success('Signup Success');
								alertify.alert("Signup Success", function(){
									window.location="signin.php";
								});
							}
							else
							{
								$("#signup_email").closest(".login-mail").css('border','2px solid #ec000069');
								$("#signup_email").focus();
								$("#error").text(data);
								alertify.error(data);
								
							}
						}
					});
					
					return false;
				});
				
			});
		</script>
		<?php include_once"footer_scripts.php";?>
	</body>
</html>

