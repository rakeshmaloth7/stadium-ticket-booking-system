<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Minimal | Forms</title>
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
							<span>Add Category</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Add Category</h3>
							<div class="panel-body">
								<form class="form-horizontal" id="add_category" method="post">
												<div class="form-group">
													<label class="col-md-2 control-label">Category Name*</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" id="category_name" placeholder="Category Name"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Detail 1 :</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" id="detail1" placeholder="Detail 1 Here"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Detail 2 :</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-key"></i>
															</span>
															<input type="text" class="form-control1 myform" id="detail2" placeholder="Detail 2 Here"/>
														</div>
													</div>
												</div>
												<p class="myerror" id="error"></p><br/>
											<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit" value="Add Category">
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
			$("#category_name").focus();
				$("#add_category").submit(function(){
					var category_name = $.trim($('#category_name').val());
					var detail1 = $.trim($('#detail1').val());
					var detail2 = $.trim($('#detail2').val());
					var alphanum_valid = /^[-_ a-zA-Z0-9]+$/;
					if(category_name=="")
					{
						$("#category_name").focus();
						$("#category_name").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Category Name');
						alertify.error('Please Provide a Category Name');
						return false;
					}
					if(category_name.length<3)
					{
						$("#category_name").focus();
						$("#category_name").css('border','2px solid #ec000069');
						$("#error").text('Category Name Should be Minimum 3 Charachter');
						alertify.error('Category Name Should be Minimum 3 Charachter');
						return false;
					}
					if(!alphanum_valid.test(category_name))
					{
						$("#category_name").focus();
						$("#category_name").css('border','2px solid #ec000069');
						$("#error").text('Category Name can Only Contains Alpha Numeric Charachter');
						alertify.error('Category Name can Only Contains Alpha Numeric Charachter');
						return false;
					}
					$("#category_name").css('border','1px solid green');
					$("#error").text('');
					$.ajax({
						url : "ajax/user.php",
						method:"post",
						data:{"category_name":category_name,"detail1":detail1,"detail2":detail2,"add_category":1},
						success:function(data){
							if(data==1)
							{
								$('#category_name').val('');
								$('#category_name').css('border','1px solid #BEBEBE');
								alertify.alert("Category Added Successfully", function(){
								window.location = "view_category.php";
								});
							}
							else if(data==2)
							{
								$("#category_name").css('border','2px solid #ec000069');
								$("#category_name").focus();
								$("#error").text('This Category Already Exists');
								alertify.error('This Category Already Exists');
							}
							else if(data==0)
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