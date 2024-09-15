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
							<span>View games</span>
						</h2>
					</div>
					<!--//banner-->
					<!--faq-->
					<div class="blank">
						<div class="blank-page" id="display">
							<?php include_once"view_games_data.php";?>
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
				$("#display").on("click",".del_games",function(){
					var games_id = $(this).attr('data-games_id');
					alertify.confirm("Are You Sure to Delete - games Image",
					function(){
						$.ajax({
							url : "ajax/user.php",
							method:"post",
							data:{"games_id":games_id,"delete_games":1},
							success:function(data){
								if(data==1)
								{
									$("#display").load('view_games_data.php');
									alertify.success("games Deleted Successfully");
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