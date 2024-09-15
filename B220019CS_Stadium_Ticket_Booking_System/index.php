<?php
	session_start();
	require_once"admin/db/db_config.php";
?><!DOCTYPE html>
<html>
	<head>
		<title>games Pro | Home</title>
		<?php include_once"head_files.php";?>
	</head>
	<body>
		<!--/main-header-->
		<!--/banner-section-->
		<?php include_once"home_banner.php";?>
		<!--/banner-section-->
		<!--//main-header-->
		<!--/banner-bottom-->
		<?php include_once"login-section.php";?>
		<!--/content-inner-section-->
		<div class="w3_content_agilleinfo_inner">
			<div class="agile_featured_games">
				
				<!--//tab-section-->
				<?php include_once"games.php";?>
				
				</div>
				</div>
				<!--//content-inner-section-->
				<!--/footer-bottom-->
				<?php include_once"footer.php";?>
				<?php include_once"footer_scripts.php";?>
				</body>
				</html>				