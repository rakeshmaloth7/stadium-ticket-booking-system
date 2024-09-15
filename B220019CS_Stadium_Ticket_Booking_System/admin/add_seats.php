<?php require_once"db/session.php";
	require_once"db/db_config.php";
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
							<span>Add seats</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Add seats</h3>
							<div class="panel-body">
								<form class="form-horizontal"  method="post" id="add_seats" action="ajax/user.php"   enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">seats Name :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform" name="seats_name" id="seats_name" placeholder="seats Name Here"/>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">seats Limit :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="number" class="form-control1 myform" name="seats_limit" id="seats_limit" placeholder="seats Limit "/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">seats Rate :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="number" class="form-control1 myform" name="seats_rate" id="seats_rate" placeholder="seats Rate "/>
											</div>
										</div>
									</div>
									
									<p class="myerror" id="error"></p><br/>
									<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit"  name="add_seats" value="Add seats">
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
				$("#add_seats").submit(function(){
					var seats_name = $.trim($('#seats_name').val());
					var seats_rate = $.trim($('#seats_rate').val());
					var seats_limit = $.trim($('#seats_limit').val());
					if(seats_name=="")
					{
						$("#seats_name").focus();
						$("#seats_name").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a seats Name');
						alertify.error('Please Provide a seats Name');
						return false;
					}
					if(seats_limit=="")
					{
						$("#seats_limit").focus();
						$("#seats_limit").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a seats  seat limit');
						alertify.error('Please Provide a seats seat limit');
						return false;
					}
					if(seats_rate<0)
					{
						$("#seats_rate").focus();
						$("#seats_rate").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a seats  rate');
						alertify.error('Please Provide a seats rate');
						return false;
					}
					$("#error").text('');
						$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"seats_name":seats_name,"seats_limit":seats_limit,"seats_rate":seats_rate,"add_seats":1},
						success:function(data){
							if(data==1)
							{
								$('#seats_name').css('border','1px solid #BEBEBE');
								alertify.alert("seats Added Successfully", function(){
									window.location = "view_seats.php";
								});
							}
							else
							{
								alertify.alert("Something Wrong", function(){
									location.reload();
								});
							}
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>