<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Minimal | View Category</title>
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
							<span>View Category</span>
						</h2>
					</div>
					<!--//banner-->
					<!--faq-->
					<div class="blank">
						<div class="blank-page" id="display">
							<?php include_once"view_cat_data.php";?>
						</div>
					</div>
					<!--//faq-->
					<!---->
					<?php include_once"footer.php";?>
					</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php include_once"footer_scripts.php";?>
		<script>
			$(document).ready(function(){
				$("#display").on("click",".del_category",function(){
					var cat_id = $(this).attr('data-cat_id');
					var cat_name = $(this).attr('data-cat_name');
					alertify.confirm("Are You Sure to Delete - "+cat_name+" Category",
					function(){
						$.ajax({
							url : "ajax/user.php",
							method:"post",
							data:{"cat_id":cat_id,"delete_category":1},
							success:function(data){
								if(data==1)
								{
									$("#display").load('view_cat_data.php');
									alertify.success("Category Deleted Successfully");
								}
								else if(data==0)
								{
									alertify.alert("Something Wrong", function(){
										location.reload();
									});
								}
							}
						});
					},
					function(){
						alertify.error("You Pressed Cancel");
					});
				});
			});
		</script>
	</body>
</html>