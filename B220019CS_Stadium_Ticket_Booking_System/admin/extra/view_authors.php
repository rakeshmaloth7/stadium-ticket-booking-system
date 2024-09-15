<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Minimal | View Author</title>
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
							<span>View Author</span>
						</h2>
					</div>
					<!--//banner-->
					<!--faq-->
					<div class="blank">
						<div class="blank-page" id="display">
							<?php include_once"view_auth_data.php";?>
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
				$("#display").on("click",".del_author",function(){
					var author_id = $(this).attr('data-author_id');
					var author_name = $(this).attr('data-author_name');
					alertify.confirm("Are You Sure to Delete - "+author_name+" Author",
					function(){
						$.ajax({
							url : "ajax/user.php",
							method:"post",
							data:{"author_id":author_id,"delete_author":1},
							success:function(data){
								if(data==1)
								{
									$("#display").load('view_auth_data.php');
									alertify.success("Author Deleted Successfully");
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