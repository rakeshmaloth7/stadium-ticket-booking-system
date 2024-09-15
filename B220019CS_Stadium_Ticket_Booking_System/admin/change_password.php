<?php require_once"db/session.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Stadium Ticket Booking</title>
		<?php include_once"head_files.php";?>
	</head>
	<body>
		<div id="wrapper">
			<!----->
			<?php include_once"header.php";?>
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="content-main">
					
					<!--banner-->
					<div class="banner">
						<h2>
							<a href="index.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Change Password</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						
						
						<div class="grid-form1">
							<h3>Change Password</h3>
							
							
							<div class="panel-body">
								<form class="form-horizontal"  id="change_pass">
									<div class="form-group">
										<label class="col-md-2 control-label">Old Password</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" id="opassword"  class="form-control1 myform" placeholder="Old Password">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">New Password</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" id="password" class="form-control1 myform" placeholder="New Password">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Confirm Password</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" id="cpassword" class="form-control1 myform" placeholder="Confirm Password">
											</div>
										</div>
									</div>
									<p class="myerror" id="error"></p>
									<br/>
									<br/>
									<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit" id="login_check" id="login_check" value="Change Password">
										</label>
									</div>
								</form>
							</div>
							
						</div>
					</div>
					<!--//grid-->
					<!---->
					<?php include_once"footer.php";?>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php include_once"footer_scripts.php";?>
		<script>
			$(document).ready(function(){
				$("#change_pass").submit(function(){
					var password = $("#password").val();
					password = $.trim(password);
					var cpassword = $("#cpassword").val();
					cpassword = $.trim(cpassword);
					var opassword = $("#opassword").val();
					opassword = $.trim(opassword);
					if(opassword.length==0)
					{
						$("#opassword").focus();
						$("#opassword").css('border','2px solid #ec000069');
						$("#error").text('Please Input Old Password');
						alertify.error('Please Input Old Password');
						return false;
					}
					$("#opassword").css('border','1px solid green');
					if(opassword.length<5)
					{
						$("#opassword").focus();
						$("#opassword").css('border','2px solid #ec000069');
						$("#error").text(' Old Password Must Be 6 Charachter');
						alertify.error(' Old Password	 Must Be 6 Charachter');
						return false;
					}
					$("#opassword").css('border','1px solid green');
						
					if(password.length<5)
					{
						$("#password").focus();
						$("#password").css('border','2px solid #ec000069');
						$("#error").text('Password Must Be 6 Charachter');
						alertify.error('Password Must Be 6 Charachter');
						return false;
					}
					$("#password").css('border','1px solid green');
					if(password!=cpassword)
					{
						$("#cpassword").focus();
						$("#password").css('border','2px solid #ec000069');
						$("#cpassword").css('border','2px solid #ec000069');
						$("#error").text('Password And Confirm Password Not Match');
						alertify.error('Password And Confirm Password Not Match');
						return false;
					}
					
					
					
					
					$("#error").text('');
					
					$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"opassword":opassword,"password":password,"cpassword":cpassword,"change_pass":1},
						success:function(data){
							if(data==1)
							{
								$(this).attr("disabled","disabled");
								$(".myform").each(function(){
									$(this).val('');
									$(this).css('border','1px solid #e0e0e0');
								});
								alertify.alert("Password Changed", function(){
									alertify.success('Password Changed');
								});
							}
							else if(data==0)
							{ alertify.success("No Change"); }
							else if(data==2)
							{
								$(".myform").each(function(){
									$(this).css('border','1px solid #e0e0e0');
								});
								$("#opassword").css('border','2px solid #ec000069');
								$("#opassword").focus();
								$("#error").text("Incorrect Old Password");
								alertify.error("Incorrect Old Password");
								
							}
							
						}
					});
					
					return false;
				});
				
			});
		</script>
	</body>
</html>

