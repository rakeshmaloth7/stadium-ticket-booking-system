<?php require_once"db/session.php";
	require_once"db/db_config.php";
	extract(mysqli_fetch_array(select("SELECT * FROM user  WHERE user.userid = '".$_SESSION['userid']."'")));
?>
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
							<span>Update Details</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Update Details</h3>
							<div class="panel-body">
								<form class="form-horizontal" id="update_details" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">Name</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" id="username" value="<?=$name?>" placeholder="Enter Your Name"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Contact</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" value="<?=$contact?>" id="contact" placeholder="Enter Your Contact No"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">City</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" value="<?=$city?>" id="city" placeholder="Enter Your City"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Address</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<textarea id="address" class="form-control1 myform" placeholder="Enter Your Address" style="margin: 0px; width: 306px; height: 101px;"><?=$address?></textarea>
														</div>
													</div>
												</div>
												<p class="myerror" id="error"></p><br/>
												
											<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit" value="Update Details">
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
				$("#update_details").submit(function(){
					var username = $.trim($('#username').val());
					var contact = $.trim($('#contact').val());
					var city = $.trim($('#city').val());
					var address = $.trim($('#address').val());
					var mobile_first = contact.charAt(0);
					var alphanum_valid = /^[-_ a-zA-Z0-9]+$/;
					var alpha_valid = /^[-_ a-zA-Z]+$/;
					var num_valid = /^[-0-9]+$/;
					var num_valid2 = /^[-6-9]+$/;
					if(username=="")
					{
						$("#username").focus();
						$("#username").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Name');
						alertify.error('Please Provide a Name');
						return false;
					}
					if(username.length<3)
					{
						$("#username").focus();
						$("#username").css('border','2px solid #ec000069');
						$("#error").text('Name Should be Minimum 3 Charachter');
						alertify.error('Name Should be Minimum 3 Charachter');
						return false;
					}
					if(!alphanum_valid.test(username))
					{
						$("#username").focus();
						$("#username").css('border','2px solid #ec000069');
						$("#error").text('Name can Only Contains Alpha Numeric Charachter');
						alertify.error('Name can Only Contains Alpha Numeric Charachter');
						return false;
					}
					$("#username").css('border','1px solid green');
					if(contact=="")
					{
						$("#contact").focus();
						$("#contact").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Contact No.');
						alertify.error('Please Provide a Contact No.');
						return false;
					}
					if(contact.length!=10)
					{
						$("#contact").focus();
						$("#contact").css('border','2px solid #ec000069');
						$("#error").text('Enter Valid  Contact No.');
						alertify.error('Enter Valid  Contact No.');
						return false;
					}
					if(!num_valid.test(contact))
					{
						$("#contact").focus();
						$("#contact").css('border','2px solid #ec000069');
						$("#error").text('Invalid Mobile No.');
						alertify.error('Invalid Mobile No.');
						return false;
					}
					if(!num_valid2.test(mobile_first))
					{
						$("#contact").focus();
						$("#contact").css('border','2px solid #ec000069');
						$("#error").text('Invalid Mobile No.');
						alertify.error('Invalid Mobile No.');
						return false;
					}
					$("#contact").css('border','1px solid green');
					if(city.length>0)
					{
						if(city.length<3)
						{
							$("#city").focus();
							$("#city").css('border','2px solid #ec000069');
							$("#error").text('City Should be Minimum 3 Charachter');
							alertify.error('City Should be Minimum 3 Charachter');
							return false;
						}
						if(!alpha_valid.test(city))
						{
							$("#city").focus();
							$("#city").css('border','2px solid #ec000069');
							$("#error").text('City can Only Contains Alpha Charachter');
							alertify.error('City can Only Contains Alpha Charachter');
							return false;
						}
					}
					$("#city").css('border','1px solid green');
					$("#error").text('');
					$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"username":username,"contact":contact,"city":city,"address":address,"update_user_details":1},
						success:function(data){
							if(data==1)
							{
								$("input").each(function(){
									$(this).css('border','1px solid #BEBEBE');
								});
								alertify.alert("Details Updated Successfully", function(){
									location.reload();
								});
							}
							else if(data==0)
							{ alertify.error("No Change"); }
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>