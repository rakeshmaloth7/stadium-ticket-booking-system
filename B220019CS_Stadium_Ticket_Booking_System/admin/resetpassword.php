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
				<h2>Reset Account</h2>
				<div class="col-md-6">
					<div class="login-mail">
						<input type="text" placeholder="Reser Code"  id="resetcode" required="">
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
					
				</div>
				
				<div class="col-md-6 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="submit"  id="reset" value="Update Password" value="Update Password">
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
				$("#reset").click(function(){
					var password = $("#signup_password").val();
					password = $.trim(password);
					var cpassword = $("#signup_cpassword").val();
					cpassword = $.trim(cpassword);
					
					var resetcode = $("#resetcode").val();
					resetcode = $.trim(resetcode);
					
					if(resetcode.length<32)
					{
						$("#resetcode").focus();
						$("#resetcode").closest(".login-mail").css('border','2px solid #ec000069');
						$("#error").text('Invalid Reset Code');
						alertify.error('Invalid Reset Code');
						return false;
					}
					$("#resetcode").closest(".login-mail").css('border','1px solid green');
					
					
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
					$("#error").text('');
					
					$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"password":password,"cpassword":cpassword,'resetcode':resetcode,"reset_userid":<?=$_SESSION['reset_userid']?>,"reset":1},
						success:function(data){
							if(data==1)
							{
								$(this).attr("disabled","disabled");
								$("input").each(function(){
									$(this).val('');
								});
								alertify.success('Password Reseted');
								alertify.alert("Password Reseted Successfully", function(){
									window.location="signin.php";
								});
							}
							else
							{
								alertify.error('Invalid Reset Code');
								$("#resetcode").focus();
								$("#resetcode").closest(".login-mail").css('border','2px solid #ec000069');
								$("#error").text('Invalid Reset Code');
								
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

